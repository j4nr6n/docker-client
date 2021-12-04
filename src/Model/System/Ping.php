<?php

namespace j4nr6n\DockerClient\Model\System;

class Ping
{
    public ?string $osType;
    public ?string $apiVersion;
    public ?bool $isExperimental;

    public function __construct(string $osType = null, string $apiVersion = null, bool $isExperimental)
    {
        $this->osType = $osType;
        $this->apiVersion = $apiVersion;
        $this->isExperimental = $isExperimental;
    }
}
