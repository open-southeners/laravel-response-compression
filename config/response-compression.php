<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Response Compression
    |--------------------------------------------------------------------------
    |
    | Here you can configure the response size (in bytes) for the compression
    | threshold, as compressing small responses will result in processing
    | time and result response size penalty for both client and server.
    |
    */

    'enable' => env('RESPONSE_COMPRESSION_ENABLE', true),
    
    'debug' => env('RESPONSE_COMPRESSION_DEBUG', false),
    
    'order' => explode(',', env('RESPONSE_COMPRESSION_ORDER', '')),

    // Threshold size in bytes from where the compression will be applied to responses
    // @see https://docs.aws.amazon.com/apigateway/latest/developerguide/limits.html#http-api-quotas
    'threshold' => env('RESPONSE_COMPRESSION_SIZE_THRESHOLD', 10000),

    'level' => [

        // @see https://paulcalvano.com/2024-03-19-choosing-between-gzip-brotli-and-zstandard-compression/
        'zstd' => env('RESPONSE_COMPRESSION_ZSTD_LEVEL', 11), // zstandard
        
        // @see https://paulcalvano.com/2018-07-25-brotli-compression-how-much-will-it-reduce-your-content/
        'br' => env('RESPONSE_COMPRESSION_BROTLI_LEVEL', 9), // brotli

        // @see https://www.php.net/manual/en/function.gzencode.php
        'gzip' => env('RESPONSE_COMPRESSION_GZIP_LEVEL', 9),

        // @see https://www.php.net/manual/en/function.gzdeflate.php
        'deflate' => env('RESPONSE_COMPRESSION_DEFLATE_LEVEL', 9),
        
        // @see Maximum level is 12 at the moment of this written
        'lz4' => env('RESPONSE_COMPRESSION_LZ4_LEVEL', 4),

    ],

];
