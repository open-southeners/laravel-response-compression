<?php

namespace OpenSoutheners\LaravelResponseCompression;

use ReflectionEnumBackedCase;

enum CompressionEncoding: string
{
    #[EncoderAsFunction('brotli_compress')]
    case Brotli = 'br';

    #[EncoderAsFunction('gzdeflate')]
    case Deflate = 'deflate';

    #[EncoderAsFunction('gzencode')]
    case Gzip = 'gzip';

    #[EncoderAsFunction('zstd_compress')]
    case Zstandard = 'zstd';
    
    #[EncoderAsFunction('lz4_compress')]
    case Lz4 = 'lz4';
    
    /**
     * Get a list of compression encoding formats supported by the system.
     *
     * @return array<string, callable-string>
     */
    public static function listSupported(): array
    {
        $supportedList = [];
        
        foreach (self::cases() as $case) {
            if ($function = $case->isSupported()) {
                $supportedList[$case->value] = $function;
            }
        }
        
        return $supportedList;
    }
    
    /**
     * Check if compression encoding is supported by this system in case not it returns null.
     *
     * @return callable-string|null
     */
    public function isSupported(): ?string
    {
        $reflector = new ReflectionEnumBackedCase(self::class, $this->name);
        
        $attributes = $reflector->getAttributes(EncoderAsFunction::class);
        
        /** @var \OpenSoutheners\LaravelResponseCompression\EncoderAsFunction $attribute */
        $attribute = $attributes[0]->newInstance();
        
        if (function_exists($attribute->name)) {
            return $attribute->name;
        }
        
        return null;
    }
}
