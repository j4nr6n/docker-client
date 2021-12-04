<?php

namespace j4nr6n\DockerClient\Model\Image;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ImageDeleteResponseItem
{
    #[SerializedName('Untagged')]
    public ?string $untagged  = null;

    #[SerializedName('Deleted')]
    public ?string $deleted = null;
}
