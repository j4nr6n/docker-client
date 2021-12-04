<?php

namespace j4nr6n\DockerClient\Model\Volume;

use Symfony\Component\Serializer\Annotation\SerializedName;

class VolumePruneResponse
{
    /** @var string[] */
    #[SerializedName('VolumesDeleted')]
    public array $volumesDeleted = [];

    #[SerializedName('SpaceReclaimed')]
    public ?int $spaceReclaimed = null;
}
