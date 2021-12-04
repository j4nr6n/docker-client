<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Port
{
    #[SerializedName('IP')]
    public ?string $ip = null;

    #[SerializedName('PrivatePort')]
    public ?int $privatePort = null;

    #[SerializedName('PublicPort')]
    public ?int $publicPort = null;

    #[SerializedName('Type')]
    public ?string $type = null;
}
