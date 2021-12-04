<?php

namespace j4nr6n\DockerClient\Model\Image;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ImagePruneResponse
{
    #[SerializedName('ImagesDeleted')]
    public ?array $imagesDeleted = null;

    #[SerializedName('SpaceReclaimed')]
    public ?int $spaceReclaimed = null;
}
