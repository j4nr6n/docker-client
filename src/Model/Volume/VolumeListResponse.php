<?php

namespace j4nr6n\DockerClient\Model\Volume;

use Symfony\Component\Serializer\Annotation\SerializedName;

class VolumeListResponse
{
    /** @var Volume[] */
    #[SerializedName('Volumes')]
    public array $volumes = [];

    /** @var string[]|null */
    #[SerializedName('Warnings')]
    public ?array $warnings = null;
}
