<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Actor
{
    #[SerializedName('ID')]
    public ?string $id = null;

    #[SerializedName('Attributes')]
    public array $attributes = [];
}
