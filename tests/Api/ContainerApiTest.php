<?php

namespace j4nr6n\DockerClient\Tests\Api;

use j4nr6n\DockerClient\Api\ContainerApi;
use j4nr6n\DockerClient\Exception\Http\ConflictException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class ContainerApiTest extends ApiTestCase
{
    public function testItInstantiates(): void
    {
        $httpClient = new MockHttpClient(new MockResponse());
        $systemApi = new ContainerApi($httpClient, $this->getSerializer());

        self::assertInstanceOf(ContainerApi::class, $systemApi);
    }

    public function testRemoveNonExistingContainer(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 404]));
        $containerApi = new ContainerApi($httpClient, $this->getSerializer());

        $this->expectException(NotFoundException::class);
        $containerApi->remove('test_container');
    }

    public function testRemoveInUseContainer(): void
    {
        $httpClient = new MockHttpClient(new MockResponse('', ['http_code' => 409]));
        $containerApi = new ContainerApi($httpClient, $this->getSerializer());

        $this->expectException(ConflictException::class);
        $containerApi->remove('test_container');
    }
}
