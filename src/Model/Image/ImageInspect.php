<?php

namespace j4nr6n\DockerClient\Model\Image;

use j4nr6n\DockerClient\Model\Inspect\ContainerConfig;
use j4nr6n\DockerClient\Model\Inspect\GraphDriverData;
use j4nr6n\DockerClient\Model\Inspect\RootFS;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ImageInspect
{
    #[SerializedName('Id')]
    public ?string $id = null;

    /** @var string[] */
    #[SerializedName('RepoTags')]
    public array $repoTags = [];

    /** @var string[] */
    #[SerializedName('RepoDigests')]
    public array $repoDigests = [];

    #[SerializedName('Parent')]
    public ?string $parent = null;

    #[SerializedName('Comment')]
    public ?string $comment = null;

    #[SerializedName('Created')]
    public ?\DateTimeInterface $created = null;

    #[SerializedName('Container')]
    public ?string $container = null;

    #[SerializedName('ContainerConfig')]
    public ?ContainerConfig $containerConfig = null;

    #[SerializedName('DockerVersion')]
    public ?string $dockerVersion = null;

    #[SerializedName('Author')]
    public ?string $author = null;

    #[SerializedName('Config')]
    public ?ContainerConfig $config = null;

    #[SerializedName('Architecture')]
    public ?string $architecture = null;

    #[SerializedName('Os')]
    public ?string $os = null;

    #[SerializedName('OsVersion')]
    public ?string $osVersion = null;

    #[SerializedName('Size')]
    public ?int $size = null;

    #[SerializedName('VirtualSize')]
    public ?int $virtualSize = null;

    #[SerializedName('GraphDriver')]
    public ?GraphDriverData $graphDriver = null;

    #[SerializedName('RootFS')]
    public ?RootFS $rootFS = null;

    /** @var string[] */
    #[SerializedName('Metadata')]
    public array $metadata = [];
}
