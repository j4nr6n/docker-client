<?php

namespace j4nr6n\DockerClient\Tests;

use j4nr6n\DockerClient\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testItInstantiates(): void
    {
        self::assertInstanceOf(Client::class, new Client());
    }
}
