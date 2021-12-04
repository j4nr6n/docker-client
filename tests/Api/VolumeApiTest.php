<?php

namespace j4nr6n\DockerClient\Tests\Api;

use j4nr6n\DockerClient\Api\VolumeApi;
use j4nr6n\DockerClient\Exception\Http\ConflictException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class VolumeApiTest extends ApiTestCase
{
    public function testItInstantiates(): void
    {
        $httpClient = new MockHttpClient(new MockResponse());
        $volumeApi = new VolumeApi($httpClient, $this->getSerializer());

        self::assertInstanceOf(VolumeApi::class, $volumeApi);
    }

    public function testRemoveNonExistingVolume(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 404]));
        $volumeApi = new VolumeApi($httpClient, $this->getSerializer());

        $this->expectException(NotFoundException::class);
        $volumeApi->remove('test_volume');
    }

    public function testRemoveInUseVolume(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 409]));
        $volumeApi = new VolumeApi($httpClient, $this->getSerializer());

        $this->expectException(ConflictException::class);
        $volumeApi->remove('test_volume');
    }
}
