<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class NetworkSettings
{
    #[SerializedName('Networks')]
    public array $networks = [];
}
