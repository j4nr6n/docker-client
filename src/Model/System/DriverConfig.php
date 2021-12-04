<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class DriverConfig
{
    #[SerializedName('Name')]
    public ?string $name = null;

    #[SerializedName('Options')]
    public array $options = [];
}
