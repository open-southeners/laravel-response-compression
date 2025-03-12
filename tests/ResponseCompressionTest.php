<?php

namespace OpenSoutheners\LaravelResponseCompression\Tests;

use Illuminate\Support\Facades\Route;
use OpenSoutheners\LaravelResponseCompression\CompressionEncoding;
use OpenSoutheners\LaravelResponseCompression\ResponseCompression;

class ResponseCompressionTest extends TestCase
{
    protected $lightResponseContent = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Senectus et netus et malesuada fames ac turpis. Est ultricies integer quis auctor elit sed vulputate. Quam lacus suspendisse faucibus interdum posuere lorem. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis.';

    protected $heavyResponseContent = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Senectus et netus et malesuada fames ac turpis. Est ultricies integer quis auctor elit sed vulputate. Quam lacus suspendisse faucibus interdum posuere lorem. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Dictum sit amet justo donec enim diam vulputate ut. Imperdiet nulla malesuada pellentesque elit eget gravida cum. In arcu cursus euismod quis viverra nibh cras. Eget egestas purus viverra accumsan in nisl nisi scelerisque. Sit amet volutpat consequat mauris nunc congue. Fringilla phasellus faucibus scelerisque eleifend donec. Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet. Natoque penatibus et magnis dis. Sollicitudin nibh sit amet commodo nulla facilisi nullam. Pretium viverra suspendisse potenti nullam ac tortor vitae purus faucibus. Luctus venenatis lectus magna fringilla urna porttitor. Eget mi proin sed libero enim sed faucibus. Dignissim suspendisse in est ante in nibh mauris cursus. Morbi non arcu risus quis varius quam quisque id diam. Tristique magna sit amet purus. Ullamcorper morbi tincidunt ornare massa eget egestas purus viverra accumsan. Duis convallis convallis tellus id. Tristique magna sit amet purus gravida quis blandit turpis. Auctor urna nunc id cursus metus aliquam eleifend. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Ipsum dolor sit amet consectetur adipiscing. Sit amet nisl suscipit adipiscing bibendum est ultricies. Sit amet mauris commodo quis imperdiet. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Non sodales neque sodales ut etiam sit amet nisl. Risus feugiat in ante metus dictum. Vulputate dignissim suspendisse in est ante. Sagittis vitae et leo duis ut diam quam nulla. Vivamus at augue eget arcu dictum. Vel pretium lectus quam id leo in vitae turpis. Mi in nulla posuere sollicitudin aliquam ultrices sagittis. Mattis aliquam faucibus purus in massa tempor nec. Facilisis mauris sit amet massa vitae. Nullam eget felis eget nunc lobortis mattis aliquam. Vitae ultricies leo integer malesuada nunc. Habitant morbi tristique senectus et netus et malesuada fames. Sit amet consectetur adipiscing elit pellentesque habitant morbi tristique. Cras pulvinar mattis nunc sed blandit. Viverra maecenas accumsan lacus vel facilisis volutpat est. Consequat nisl vel pretium lectus. Faucibus et molestie ac feugiat sed lectus vestibulum mattis. Ut diam quam nulla porttitor massa id neque. Lectus arcu bibendum at varius vel pharetra. Ullamcorper a lacus vestibulum sed arcu non odio euismod. Amet nulla facilisi morbi tempus iaculis urna id volutpat. Interdum velit euismod in pellentesque massa placerat duis ultricies lacus. At in tellus integer feugiat scelerisque varius morbi enim. Eu feugiat pretium nibh ipsum consequat nisl. Enim nulla aliquet porttitor lacus luctus accumsan. Vulputate dignissim suspendisse in est ante in nibh mauris cursus. Tincidunt augue interdum velit euismod. Porta lorem mollis aliquam ut porttitor leo a diam. Massa tempor nec feugiat nisl pretium fusce. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Mauris in aliquam sem fringilla ut morbi tincidunt augue. Interdum velit laoreet id donec ultrices tincidunt arcu. Justo donec enim diam vulputate ut. Varius morbi enim nunc faucibus a pellentesque. Risus in hendrerit gravida rutrum quisque non tellus orci. At in tellus integer feugiat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Egestas purus viverra accumsan in nisl nisi scelerisque. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Viverra tellus in hac habitasse. Gravida rutrum quisque non tellus orci ac auctor augue. Sit amet consectetur adipiscing elit ut aliquam purus sit. Tortor condimentum lacinia quis vel eros donec ac odio. Pretium fusce id velit ut tortor pretium. Urna et pharetra pharetra massa massa ultricies mi quis. A lacus vestibulum sed arcu. Eu tincidunt tortor aliquam nulla facilisi. Adipiscing enim eu turpis egestas pretium. Lorem dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Amet risus nullam eget felis eget nunc. Euismod lacinia at quis risus sed vulputate odio ut enim. Nisl tincidunt eget nullam non nisi est sit amet. Consequat semper viverra nam libero justo laoreet sit. Ultricies mi quis hendrerit dolor magna. Aenean vel elit scelerisque mauris pellentesque. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Nam at lectus urna duis convallis. Fringilla ut morbi tincidunt augue interdum velit. Faucibus ornare suspendisse sed nisi lacus sed viverra. Scelerisque in dictum non consectetur a. Tincidunt dui ut ornare lectus sit amet est. Sed ullamcorper morbi tincidunt ornare massa eget. Egestas sed tempus urna et pharetra pharetra massa. Placerat vestibulum lectus mauris ultrices eros in cursus. Arcu dictum varius duis at consectetur lorem. Purus faucibus ornare suspendisse sed nisi lacus sed. Turpis in eu mi bibendum neque. Lorem ipsum dolor sit amet consectetur adipiscing elit. Vivamus arcu felis bibendum ut tristique et egestas. Eros in cursus turpis massa tincidunt dui ut. Montes nascetur ridiculus mus mauris vitae ultricies leo integer malesuada. Ut tristique et egestas quis ipsum suspendisse. In eu mi bibendum neque egestas congue. Tristique senectus et netus et malesuada fames. Auctor neque vitae tempus quam. Nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Pulvinar pellentesque habitant morbi tristique. Eget egestas purus viverra accumsan in nisl nisi. Iaculis eu non diam phasellus vestibulum lorem sed risus. At varius vel pharetra vel turpis. Orci nulla pellentesque dignissim enim sit. Non enim praesent elementum facilisis leo vel fringilla est. Lectus nulla at volutpat diam ut venenatis tellus in metus. Mauris augue neque gravida in fermentum et sollicitudin. Eleifend quam adipiscing vitae proin sagittis nisl. Amet nulla facilisi morbi tempus iaculis urna id volutpat lacus. Duis ultricies lacus sed turpis. Non sodales neque sodales ut etiam sit amet. Sed ullamcorper morbi tincidunt ornare massa eget egestas. Diam quis enim lobortis scelerisque fermentum dui faucibus in ornare. Pellentesque elit eget gravida cum sociis natoque penatibus et magnis. Donec ac odio tempor orci dapibus. Luctus accumsan tortor posuere ac ut consequat semper. Quis viverra nibh cras pulvinar mattis nunc sed blandit. Velit euismod in pellentesque massa placerat duis ultricies lacus. Sit amet consectetur adipiscing elit pellentesque. At in tellus integer feugiat scelerisque. Amet commodo nulla facilisi nullam vehicula ipsum a. Dignissim suspendisse in est ante. Urna et pharetra pharetra massa massa ultricies. Sed faucibus turpis in eu mi bibendum neque egestas. Proin sagittis nisl rhoncus mattis. Duis convallis convallis tellus id interdum velit. Risus viverra adipiscing at in tellus. Felis bibendum ut tristique et egestas quis ipsum suspendisse ultrices. Elementum integer enim neque volutpat ac tincidunt vitae. Libero nunc consequat interdum varius. Malesuada fames ac turpis egestas maecenas pharetra. Sed viverra tellus in hac habitasse platea dictumst vestibulum. Fames ac turpis egestas integer. Risus nec feugiat in fermentum posuere urna nec tincidunt praesent. Tristique senectus et netus et. Amet nisl purus in mollis. Justo eget magna fermentum iaculis eu non diam. Enim ut sem viverra aliquet eget sit amet tellus cras. Aenean euismod elementum nisi quis eleifend quam. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Sagittis orci a scelerisque purus semper eget duis. Facilisis magna etiam tempor orci eu lobortis elementum nibh. Interdum posuere lorem ipsum dolor sit. Imperdiet massa tincidunt nunc pulvinar sapien et. Mattis nunc sed blandit libero volutpat sed cras ornare arcu. Orci dapibus ultrices in iaculis nunc. Elit eget gravida cum sociis natoque. Aliquet eget sit amet tellus cras. Nisl nisi scelerisque eu ultrices vitae. Massa id neque aliquam vestibulum morbi blandit. Nisi vitae suscipit tellus mauris a diam maecenas sed. Tempor nec feugiat nisl pretium fusce id velit ut tortor. At lectus urna duis convallis convallis tellus id interdum. Eget gravida cum sociis natoque penatibus et magnis. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Condimentum mattis pellentesque id nibh tortor id aliquet. Amet tellus cras adipiscing enim eu turpis. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Neque vitae tempus quam pellentesque nec.  Enim ut sem viverra aliquet eget sit amet tellus cras. Aenean euismod elementum nisi quis eleifend quam. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Sagittis orci a scelerisque purus semper eget duis. Facilisis magna etiam tempor orci eu lobortis elementum nibh. Interdum posuere lorem ipsum dolor sit. Imperdiet massa tincidunt nunc pulvinar sapien et. Mattis nunc sed blandit libero volutpat sed cras ornare arcu. Orci dapibus ultrices in iaculis nunc. Elit eget gravida cum sociis natoque. Aliquet eget sit amet tellus cras. Nisl nisi scelerisque eu ultrices vitae. Massa id neque aliquam vestibulum morbi blandit. Nisi vitae suscipit tellus mauris a diam maecenas sed. Tempor nec feugiat nisl pretium fusce id velit ut tortor. At lectus urna duis convallis convallis tellus id interdum. Eget gravida cum sociis natoque penatibus et magnis. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Condimentum mattis pellentesque id nibh tortor id aliquet. Amet tellus cras adipiscing enim eu turpis. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Neque vitae tempus quam pellentesque nec.  Enim ut sem viverra aliquet eget sit amet tellus cras. Aenean euismod elementum nisi quis eleifend quam. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Sagittis orci a scelerisque purus semper eget duis. Facilisis magna etiam tempor orci eu lobortis elementum nibh. Interdum posuere lorem ipsum dolor sit. Imperdiet massa tincidunt nunc pulvinar sapien et. Mattis nunc sed blandit libero volutpat sed cras ornare arcu. Orci dapibus ultrices in iaculis nunc. Elit eget gravida cum sociis natoque. Aliquet eget sit amet tellus cras. Nisl nisi scelerisque eu ultrices vitae. Massa id neque aliquam vestibulum morbi blandit. Nisi vitae suscipit tellus mauris a diam maecenas sed. Tempor nec feugiat nisl pretium fusce id velit ut tortor. At lectus urna duis convallis convallis tellus id interdum. Eget gravida cum sociis natoque penatibus et magnis. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Condimentum mattis pellentesque id nibh tortor id aliquet. Amet tellus cras adipiscing enim eu turpis. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Neque vitae tempus quam pellentesque nec.';

    protected function setUp(): void
    {
        parent::setUp();

        Route::get('/light', function () {
            return response()->json([
                'content' => $this->lightResponseContent,
            ]);
        })->middleware(ResponseCompression::class);

        Route::get('/heavy', function () {
            return response()->json([
                'content' => $this->heavyResponseContent,
            ]);
        })->middleware(ResponseCompression::class);
    }
    
    public function testClientGetRawResponseWhenThresholdNotReached()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/light', ['Accept-Encoding' => CompressionEncoding::Gzip->value]);

        $response->assertHeaderMissing('Content-Encoding');

        $this->assertEquals(
            $response->json(),
            ['content' => $this->lightResponseContent]
        );
    }

    public function testClientGetRawResponseWhenNotEnabled()
    {
        config(['response-compression.enable' => false]);

        $this->withoutExceptionHandling();

        $response = $this->get('/heavy', ['Accept-Encoding' => CompressionEncoding::Gzip->value]);

        $response->assertHeaderMissing('Content-Encoding');

        $this->assertEquals(
            $response->json(),
            ['content' => $this->heavyResponseContent]
        );
    }

    public function testClientGetResponseCompressedWhenThresholdReached()
    {
        $response = $this->get('/heavy', ['Accept-Encoding' => CompressionEncoding::Gzip->value]);

        $response->assertHeader('Content-Encoding', CompressionEncoding::Gzip->value);

        $this->assertEquals(
            gzdecode($response->getContent()),
            json_encode(['content' => $this->heavyResponseContent])
        );
    }
    
    public function testClientGetResponseWithVaporHeaderWhenWithinVapor()
    {
        putenv('VAPOR_SSM_PATH=1');

        $response = $this->get('/heavy', ['Accept-Encoding' => CompressionEncoding::Deflate->value]);

        $response->assertHeader('X-Vapor-Base64-Encode', 'True');
    }

    public function testClientGetResponseInThePreferredEncoding()
    {
        $response = $this->get('/heavy', ['Accept-Encoding' => implode(', ', [CompressionEncoding::Gzip->value, CompressionEncoding::Deflate->value])]);

        $response->assertHeader('Content-Encoding', CompressionEncoding::Gzip->value);

        $this->assertEquals(
            gzdecode($response->getContent()),
            json_encode(['content' => $this->heavyResponseContent])
        );
    }
    
    public function testClientGetResponseInThePreferredAsFirstOrderConfiguredEncoding()
    {
        config(['response-compression.order' => ['br', 'gzip']]);
        
        $response = $this->get('/heavy', ['Accept-Encoding' => implode(', ', [
            CompressionEncoding::Zstandard->value,
            CompressionEncoding::Gzip->value,
            CompressionEncoding::Brotli->value,
        ])]);

        $response->assertHeader('Content-Encoding', CompressionEncoding::Brotli->value);

        $this->assertEquals(
            brotli_uncompress($response->getContent()),
            json_encode(['content' => $this->heavyResponseContent])
        );
    }

    public function testClientGetResponseAskingAnUnrecognisedEncodingReceivesRawResponse()
    {
        $response = $this->get('/heavy', ['Accept-Encoding' => 'unknown']);

        $response->assertHeaderMissing('Content-Encoding');

        $this->assertEquals(
            $response->json(),
            ['content' => $this->heavyResponseContent]
        );
    }

    public function testClientGetResponseWithContentEncodingHeaderAlreadyAttachedReceivesRawResponse()
    {
        Route::get('/heavy-ignored', function () {
            return response()->json([
                'content' => $this->heavyResponseContent,
            ], 200, ['Content-Encoding' => CompressionEncoding::Deflate->value]);
        })->middleware(ResponseCompression::class);

        $response = $this->get('/heavy-ignored', ['Accept-Encoding' => CompressionEncoding::Gzip->value]);

        $response->assertHeader('Content-Encoding', CompressionEncoding::Deflate->value);

        $this->assertEquals(
            $response->json(),
            ['content' => $this->heavyResponseContent]
        );
    }

    public function testClientGetStreamDownloadResponseReceivesRawResponse()
    {
        Route::get('/download', function () {
            return response()->streamDownload(function () {
                echo $this->heavyResponseContent;
            });
        })->middleware(ResponseCompression::class);

        $response = $this->get('/download', ['Accept-Encoding' => CompressionEncoding::Deflate->value]);

        $response->assertHeaderMissing('Content-Encoding');

        $this->assertEquals(
            $response->streamedContent(),
            $this->heavyResponseContent
        );
    }

    public function testClientGetResponseUsingZstandardEncoding()
    {
        $response = $this->get('/heavy', ['Accept-Encoding' => CompressionEncoding::Zstandard->value]);

        $response->assertHeader('Content-Encoding', CompressionEncoding::Zstandard->value);

        $this->assertEquals(
            zstd_uncompress($response->getContent()),
            json_encode(['content' => $this->heavyResponseContent])
        );
    }

    public function testClientGetResponseUsingBrotliEncoding()
    {
        $response = $this->get('/heavy', ['Accept-Encoding' => CompressionEncoding::Brotli->value]);

        $response->assertHeader('Content-Encoding', CompressionEncoding::Brotli->value);

        $this->assertEquals(
            brotli_uncompress($response->getContent()),
            json_encode(['content' => $this->heavyResponseContent])
        );
    }
    
    public function testClientGetResponseUsingLz4Encoding()
    {
        $response = $this->get('/heavy', ['Accept-Encoding' => CompressionEncoding::Lz4->value]);

        $response->assertHeader('Content-Encoding', CompressionEncoding::Lz4->value);

        $this->assertEquals(
            lz4_uncompress($response->getContent()),
            json_encode(['content' => $this->heavyResponseContent])
        );
    }
}
