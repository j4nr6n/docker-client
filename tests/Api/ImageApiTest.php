<?php

namespace j4nr6n\DockerClient\Tests\Api;

use j4nr6n\DockerClient\Api\ImageApi;
use j4nr6n\DockerClient\Exception\Http\ConflictException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class ImageApiTest extends ApiTestCase
{
    public function testItInstantiates(): void
    {
        $httpClient = new MockHttpClient(new MockResponse());
        $imageApi = new ImageApi($httpClient, $this->getSerializer());

        self::assertInstanceOf(ImageApi::class, $imageApi);
    }

    public function testRemoveNonExistingImage(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 404]));
        $imageApi = new ImageApi($httpClient, $this->getSerializer());

        $this->expectException(NotFoundException::class);
        $imageApi->remove('test_image');
    }

    public function testRemoveInUseImage(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 409]));
        $imageApi = new ImageApi($httpClient, $this->getSerializer());

        $this->expectException(ConflictException::class);
        $imageApi->remove('test_image');
    }
}
