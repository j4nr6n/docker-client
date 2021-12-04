<?php

namespace j4nr6n\DockerClient\Model\Network;

use Symfony\Component\Serializer\Annotation\SerializedName;

class NetworkPruneResponse
{
    #[SerializedName('NetworksDeleted')]
    public ?array $networksDeleted = null;
}
