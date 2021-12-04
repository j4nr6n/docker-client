<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PeerNode
{
    #[SerializedName('NodeID')]
    public ?string $nodeId = null;

    #[SerializedName('Addr')]
    public ?string $addr = null;
}
