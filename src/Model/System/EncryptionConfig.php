<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class EncryptionConfig
{
    #[SerializedName('AutoLockManagers')]
    public ?bool $autoLockManagers = null;
}
