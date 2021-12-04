<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CheckAuthResponse
{
    #[SerializedName('Status')]
    public ?string $status = null;

    #[SerializedName('IdentityToken')]
    public ?string $identityToken = null;
}
