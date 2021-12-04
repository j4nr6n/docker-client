<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Raft
{
    #[SerializedName('SnapshotInterval')]
    public ?int $snapshotInterval = null;

    #[SerializedName('KeepOldSnapshots')]
    public ?int $keepOldSnapshots = null;

    #[SerializedName('LogEntriesForSlowFollowers')]
    public ?int $logEntriesForSlowFollowers = null;

    #[SerializedName('ElectionTick')]
    public ?int $electionTick = null;

    #[SerializedName('HeartbeatTick')]
    public ?int $heartbeatTick = null;
}
