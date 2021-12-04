<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class BuildCacheSummary
{
    #[SerializedName('ID')]
    public ?string $id = null;

    #[SerializedName('Parent')]
    public ?string $parent = null;

    #[SerializedName('Type')]
    public ?string $type = null;

    #[SerializedName('Description')]
    public ?string $description = null;

    #[SerializedName('InUse')]
    public ?bool $inUse = null;

    #[SerializedName('Shared')]
    public ?bool $shared = null;

    #[SerializedName('Size')]
    public ?int $size = null;

    #[SerializedName('CreatedAt')]
    public ?\DateTimeInterface $createdAt = null;

    #[SerializedName('LastUsedAt')]
    public ?\DateTimeInterface $lastUsedAt = null;

    #[SerializedName('UsageCount')]
    public ?int $usageCount = null;
}
