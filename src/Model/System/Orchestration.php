<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Orchestration
{
    #[SerializedName('TaskHistoryRetentionLimit')]
    public ?int $taskHistoryRetentionLimit = null;
}
