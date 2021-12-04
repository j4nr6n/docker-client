<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class TmpfsOptions
{
    #[SerializedName('SizeBytes')]
    public ?int $sizeBytes = null;

    #[SerializedName('Mode')]
    public ?int $mode = null;
}
