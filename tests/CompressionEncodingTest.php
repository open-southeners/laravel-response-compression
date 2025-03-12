<?php

namespace OpenSoutheners\LaravelResponseCompression
{
    function function_exists(string $name): bool {
        if (getenv('FUNCTION_EXISTS_MOCK')) {
            return false;
        }
        
        return \function_exists($name);
    }
}

namespace OpenSoutheners\LaravelResponseCompression\Tests
{
    use OpenSoutheners\LaravelResponseCompression\CompressionEncoding;
    use PHPUnit\Framework\TestCase;
    
    class CompressionEncodingTest extends TestCase
    {
        public function testCompressionEncodingListSupportedReturnsArray()
        {
            $supportedList = CompressionEncoding::listSupported();
            
            $this->assertIsArray($supportedList);
            $this->assertArrayHasKey(CompressionEncoding::Deflate->value, $supportedList);
            $this->assertEmpty(array_diff(
                array_map(fn ($case) => $case->value, CompressionEncoding::cases()),
                array_keys($supportedList),
            ));
        }
        
        public function testCompressionEncodingIsSupportedGetsNullWhenNonPresent()
        {
            putenv('FUNCTION_EXISTS_MOCK=1');

            $supported = CompressionEncoding::Lz4->isSupported();
            
            putenv('FUNCTION_EXISTS_MOCK=');
            
            $this->assertNull($supported);
        }
    }
}
