<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class TaskDefaults
{
    #[SerializedName('LogDriver')]
    public ?LogDriver $logDriver = null;
}
