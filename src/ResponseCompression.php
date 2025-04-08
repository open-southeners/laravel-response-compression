<?php

namespace OpenSoutheners\LaravelResponseCompression;

use Closure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ResponseCompression
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): \Symfony\Component\HttpFoundation\Response  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        return tap($next($request), function ($response) use ($request) {
            $compressionAlgorithm = $this->shouldCompressUsing($request);

            if ($this->shouldCompressResponse($response) && $compressionAlgorithm !== null) {
                [$algo, $function] = $compressionAlgorithm;

                $originalResponseContent = $response->getContent();
                $originalResponseSize = strlen($originalResponseContent);
                
                /** @var string $compressedContent */
                $compressedContent = call_user_func(
                    $function,
                    $response->getContent(),
                    config("response-compression.level.{$algo}", 9)
                );
                
                if (config('response-compression.debug', false) && function_exists('logger')) {
                    logger(
                        sprintf('Laravel response compressed from %d bytes to %d bytes using %s', $originalResponseSize, strlen($compressedContent), $algo),
                        [
                            'threshold' => config('response-compression.threshold', 10000),
                        ]
                    );
                }
                
                $response->setContent($compressedContent);

                $responseHeaders = [
                    'Content-Encoding' => $algo,
                ];
                
                if (getenv('VAPOR_SSM_PATH')) {
                    $responseHeaders['X-Vapor-Base64-Encode'] = 'True';
                }
                
                $response->headers->add($responseHeaders);
            }
        });
    }

    /**
     * Determine if response should be compressed.
     *
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     */
    protected function shouldCompressResponse($response): bool
    {
        if (
            $response instanceof BinaryFileResponse
                || $response instanceof StreamedResponse
                || !config('response-compression.enable', true)
        ) {
            return false;
        }
        
        if (
            ! $response->headers->has('Content-Encoding')
                && strlen($response->getContent() ?: '') >= config('response-compression.threshold', 10000)
        ) {
            return true;
        }
        
        return false;
    }

    /**
     * Determine which algorithm should be used to compress the response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array{0: string, 1: callable-string}|null
     */
    protected function shouldCompressUsing($request): ?array
    {
        $clientSupportedList = $request->getEncodings();
        
        $supportedList = CompressionEncoding::listSupported();
        
        /** @var string[] $preferenceList */
        $preferenceList = array_filter(config('response-compression.order', []));

        if (count($preferenceList) > 0) {
            $preferenceList = array_merge($preferenceList, array_diff(array_keys($supportedList), $preferenceList));
        }

        $fromSupportedList = array_values(array_intersect(
            $preferenceList ?: $clientSupportedList,
            $clientSupportedList,
            array_keys($supportedList)
        ));

        if ($fromSupportedList[0] ?? false) {
            return [$fromSupportedList[0], $supportedList[$fromSupportedList[0]]];
        }
        
        return null;
    }
}
