<?php

namespace j4nr6n\DockerClient\Model\Container;

use j4nr6n\DockerClient\Model\System\BindOptions;
use j4nr6n\DockerClient\Model\System\TmpfsOptions;
use j4nr6n\DockerClient\Model\System\VolumeOptions;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Mount
{
    #[SerializedName('Target')]
    public ?string $target = null;

    #[SerializedName('Source')]
    public ?string $source = null;

    #[SerializedName('Type')]
    public ?string $type = null;

    #[SerializedName('ReadOnly')]
    public ?bool $readOnly = null;

    #[SerializedName('Consistency')]
    public ?string $consistence = null;

    #[SerializedName('BindOptions')]
    public ?BindOptions $bindOptions = null;

    #[SerializedName('VolumeOptions')]
    public ?VolumeOptions $volumeOptions = null;

    #[SerializedName('TmpfsOptions')]
    public ?TmpfsOptions $tmpfsOptions = null;
}
