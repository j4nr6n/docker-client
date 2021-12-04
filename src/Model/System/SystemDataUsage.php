<?php

namespace j4nr6n\DockerClient\Model\System;

use j4nr6n\DockerClient\Model\Container\Container;
use j4nr6n\DockerClient\Model\Volume\Volume;
use Symfony\Component\Serializer\Annotation\SerializedName;

class SystemDataUsage
{
    #[SerializedName('LayersSize')]
    public ?int $layerSize = null;

    /** @var ImageSummary[] */
    #[SerializedName('Images')]
    public array $images = [];

    /** @var Container[] */
    #[SerializedName('Containers')]
    public array $containers = [];

    /** @var Volume[] */
    #[SerializedName('Volumes')]
    public array $volumes = [];

    /** @var BuildCacheSummary[] */
    #[SerializedName('BuildCache')]
    public array $buildCache = [];
}
