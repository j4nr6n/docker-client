<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use Symfony\Component\Serializer\Annotation\SerializedName;

class MountPoint
{
    #[SerializedName('Type')]
    public ?string $type = null;

    #[SerializedName('Name')]
    public ?string $name = null;

    #[SerializedName('Source')]
    public ?string $source = null;

    #[SerializedName('Destination')]
    public ?string $destination = null;

    #[SerializedName('Driver')]
    public ?string $driver = null;

    #[SerializedName('Mode')]
    public ?string $mode = null;

    #[SerializedName('RW')]
    public ?bool $rw = null;

    #[SerializedName('Propagation')]
    public ?string $propagation = null;
}
