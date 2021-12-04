<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Dispatcher
{
    #[SerializedName('HeartbeatPeriod')]
    public ?int $heartbeatPeriod = null;
}
