<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RootFS
{
    #[SerializedName('Type')]
    public ?string $type = null;

    /** @var string[] */
    #[SerializedName('Layers')]
    public array $layers = [];

    #[SerializedName('BaseLayer')]
    public ?string $baseLayer = null;
}
