<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Platform
{
    #[SerializedName('Name')]
    public ?string $name = null;
}
