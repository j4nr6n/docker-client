<?php

namespace j4nr6n\DockerClient\Tests\Api;

use j4nr6n\DockerClient\Api\NetworkApi;
use j4nr6n\DockerClient\Exception\Http\ForbiddenException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class NetworkApiTest extends ApiTestCase
{
    public function testItInstantiates(): void
    {
        $httpClient = new MockHttpClient(new MockResponse());
        $networkApi = new NetworkApi($httpClient, $this->getSerializer());

        self::assertInstanceOf(NetworkApi::class, $networkApi);
    }

    public function testRemoveNonExistingNetwork(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 404]));
        $networkApi = new NetworkApi($httpClient, $this->getSerializer());

        $this->expectException(NotFoundException::class);
        $networkApi->remove('test_network');
    }

    public function testRemoveInUseNetwork(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 403]));
        $networkApi = new NetworkApi($httpClient, $this->getSerializer());

        $this->expectException(ForbiddenException::class);
        $networkApi->remove('test_network');
    }
}
