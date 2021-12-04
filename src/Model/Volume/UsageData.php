<?php

namespace j4nr6n\DockerClient\Model\Volume;

use Symfony\Component\Serializer\Annotation\SerializedName;

class UsageData
{
    #[SerializedName('Size')]
    public ?int $size = null;

    #[SerializedName('RefCount')]
    public ?int $refCount = null;
}
