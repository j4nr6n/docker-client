<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ObjectVersion
{
    #[SerializedName('Index')]
    public ?int $index = null;
}
