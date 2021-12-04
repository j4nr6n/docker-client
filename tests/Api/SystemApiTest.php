<?php

namespace j4nr6n\DockerClient\Tests\Api;

use j4nr6n\DockerClient\Api\SystemApi;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class SystemApiTest extends ApiTestCase
{
    public function testItInstantiates(): void
    {
        $httpClient = new MockHttpClient(new MockResponse());
        $systemApi = new SystemApi($httpClient, $this->getSerializer());

        self::assertInstanceOf(SystemApi::class, $systemApi);
    }
}
