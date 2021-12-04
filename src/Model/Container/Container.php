<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Container
{
    #[SerializedName('Id')]
    public ?string $id = null;

    /** @var string[] */
    #[SerializedName('Names')]
    public array $names = [];

    #[SerializedName('Image')]
    public ?string $image = null;

    #[SerializedName('ImageID')]
    public ?string $imageId = null;

    #[SerializedName('Command')]
    public ?string $command = null;

    #[SerializedName('Created')]
    public ?int $created = null;

    /** @var Port[] */
    #[SerializedName('Ports')]
    public array $ports = [];

    #[SerializedName('SizeRw')]
    public ?int $sizeRw = null;

    #[SerializedName('SizeRootFs')]
    public ?int $sizeRootFs = null;

    #[SerializedName('Labels')]
    public array $labels = [];

    #[SerializedName('State')]
    public ?string $state = null;

    #[SerializedName('Status')]
    public ?string $status = null;

    #[SerializedName('HostConfig')]
    public ?HostConfig $hostConfig = null;

    #[SerializedName('NetworkSettings')]
    public ?NetworkSettings $networkSettings = null;

    /** @var Mount[] */
    #[SerializedName('Mounts')]
    public array $mounts = [];
}
