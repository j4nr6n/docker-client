<?php

namespace j4nr6n\DockerClient\Model\System;

use Psalm\SourceControl\Git\CommitInfo;
use Symfony\Component\Serializer\Annotation\SerializedName;

class SwarmInfo
{
    #[SerializedName('NodeID')]
    public ?string $nodeId = null;

    #[SerializedName('NodeAddr')]
    public ?string $nodeAddr = null;

    #[SerializedName('LocalNodeState')]
    public ?string $localNodeState = null;

    #[SerializedName('ControlAvailable')]
    public ?bool $controlAvailable = null;

    #[SerializedName('Error')]
    public ?string $error = null;

    #[SerializedName('RemoteManagers')]
    public ?array $remoteManagers = null;

    #[SerializedName('Nodes')]
    public ?int $nodes = null;

    #[SerializedName('Managers')]
    public ?int $managers = null;

    #[SerializedName('Cluster')]
    public ?ClusterInfo $cluster = null;
}
