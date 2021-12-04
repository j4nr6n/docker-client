<?php

namespace j4nr6n\DockerClient\Model\Container;

use j4nr6n\DockerClient\Model\Inspect;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ContainerInspect
{
    #[SerializedName('Id')]
    public ?string $id = null;

    #[SerializedName('Created')]
    public ?\DateTimeInterface $created = null;

    #[SerializedName('Path')]
    public ?string $path = null;

    /** @var string[] */
    #[SerializedName('Args')]
    public array $args = [];

    #[SerializedName('State')]
    public ?Inspect\ContainerState $state = null;

    #[SerializedName('Image')]
    public ?string $image = null;

    #[SerializedName('ResolvConfPath')]
    public ?string $resolvConfPath = null;

    #[SerializedName('HostnamePath')]
    public ?string $hostnamePath = null;

    #[SerializedName('HostsPath')]
    public ?string $hostPath = null;

    #[SerializedName('LogPath')]
    public ?string $logPath = null;

    #[SerializedName('Name')]
    public ?string $name = null;

    #[SerializedName('RestartCount')]
    public ?int $restartCount = null;

    #[SerializedName('Driver')]
    public ?string $driver = null;

    #[SerializedName('Platform')]
    public ?string $platform = null;

    #[SerializedName('MountLabel')]
    public ?string $mountLabel = null;

    #[SerializedName('ProcessLabel')]
    public ?string $processLabel = null;

    #[SerializedName('AppArmorProfile')]
    public ?string $appArmorProfile = null;

    /** @var string[]|null */
    #[SerializedName('ExecIDs')]
    public ?array $execIds = null;

    #[SerializedName('HostConfig')]
    public ?Inspect\HostConfig $hostConfig = null;

    #[SerializedName('GraphDriver')]
    public ?Inspect\GraphDriverData $graphDriver = null;

    #[SerializedName('SizeRw')]
    public ?int $sizeRw = null;

    #[SerializedName('SizeRootFs')]
    public ?int $sizeRootFs = null;

    /** @var Inspect\MountPoint[] */
    #[SerializedName('Mounts')]
    public ?array $mounts = null;

    #[SerializedName('Config')]
    public ?Inspect\ContainerConfig $config = null;

    #[SerializedName('NetworkSettings')]
    public ?Inspect\NetworkSettings $networkSettings = null;
}
