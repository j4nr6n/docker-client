<?php

namespace j4nr6n\DockerClient\Model\Image;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Image
{
    #[SerializedName('Id')]
    public ?string $id = null;

    #[SerializedName('ParentId')]
    public ?string $parentId = null;

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

    /** @var string[]|null */
    #[SerializedName('Labels')]
    public ?array $labels = null;

    #[SerializedName('Containers')]
    public ?int $containers = null;
}
