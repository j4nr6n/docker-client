<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ContainerPruneResponse
{
    #[SerializedName('ContainersDeleted')]
    public ?array $containersDeleted = null;

    #[SerializedName('SpaceReclaimed')]
    public ?int $spaceReclaimed = null;
}
