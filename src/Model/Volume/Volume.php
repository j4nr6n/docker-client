<?php

namespace j4nr6n\DockerClient\Model\Volume;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Volume
{
    #[SerializedName('Name')]
    public ?string $name = null;

    #[SerializedName('Driver')]
    public ?string $driver = null;

    #[SerializedName('Mountpoint')]
    public ?string $mountpoint = null;

    #[SerializedName('CreatedAt')]
    public ?\DateTimeInterface $createdAt = null;

    /** @var string[] */
    #[SerializedName('Status')]
    public array $status = [];

    /** @var string[]|null */
    #[SerializedName('Labels')]
    public ?array $labels = null;

    #[SerializedName('Scope')]
    public ?string $scope = null;

    /** @var string[]|null */
    #[SerializedName('Options')]
    public ?array $options = null;

    #[SerializedName('UsageData')]
    public ?UsageData $usageData = null;
}
