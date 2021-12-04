<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class BindOptions
{
    #[SerializedName('Propagation')]
    public ?string $propagation = null;

    #[SerializedName('NonRecursive')]
    public ?bool $nonRecursive = null;
}
