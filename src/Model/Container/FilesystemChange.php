<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class FilesystemChange
{
    #[SerializedName('Path')]
    public ?string $path = null;

    #[SerializedName('Kind')]
    public ?int $kind = null;
}
