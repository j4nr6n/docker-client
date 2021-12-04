<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class VolumeOptions
{
    #[SerializedName('NoCopy')]
    public ?bool $noCoppy = null;

    #[SerializedName('Labels')]
    public array $labels = [];

    #[SerializedName('DriverConfig')]
    public ?DriverConfig $driverConfig = null;
}
