<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Commit
{
    #[SerializedName('ID')]
    public ?string $id = null;

    #[SerializedName('Expected')]
    public ?string $expected = null;
}
