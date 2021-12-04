<?php

namespace j4nr6n\DockerClient\Model\Network;

use Symfony\Component\Serializer\Annotation\SerializedName;

class IPAM
{
    #[SerializedName('Driver')]
    public ?string $driver = null;

    #[SerializedName('Config')]
    public array $config = [];

    #[SerializedName('Options')]
    public array $options = [];
}
