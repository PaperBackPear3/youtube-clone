<?php

use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Nuwave\Lighthouse\Testing\RefreshesSchemaCache;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class VideoUploadTest extends TestCase
{
    use MakesGraphQLRequests;
    use RefreshesSchemaCache;

    public function test_video_can_be_uploaded(): void
    {
        $operations = [
            'query' =>
            /** @lang GraphQL */
            '
                mutation ($file: Upload!) {
                    uploadVideo(file: $file)
                }
            ',
            'variables' => [
                'file' => null,
            ],
        ];

        $map = [
            '0' => ['variables.file'],
        ];

        $file = [
            '0' => UploadedFile::fake()->create('test.pdf', 500),
        ];


        $header = [
            'X-Requested-With' => 'XMLHttpRequest',
            'Content-Type' => 'multipart/form-data',

        ];

        $response = $this->multipartGraphQL($operations, $map, $file, $header);

        $response->assertJsonStructure([
            'data' => [
                'uploadVideo',
            ],
        ], $response->json());
    }
}
