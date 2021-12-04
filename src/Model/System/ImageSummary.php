<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ImageSummary
{
    #[SerializedName('Id')]
    public ?string $id = null;

    #[SerializedName('Name')]
    public ?string $name = null;

    /** @var string[] */
    #[SerializedName('RepoTags')]
    public array $repoTags = [];

    /** @var string[]|null */
    #[SerializedName('RepoDigests')]
    public ?array $repoDigests = null;

    #[SerializedName('Created')]
    public ?int $created = null;

    #[SerializedName('Size')]
    public ?int $size = null;

    #[SerializedName('SharedSize')]
    public ?int $sharedSize = null;

    #[SerializedName('VirtualSize')]
    public ?int $virtualSize = null;

    #[SerializedName('Labels')]
    public ?array $labels = null;

    #[SerializedName('Containers')]
    public ?int $containers = null;
}
