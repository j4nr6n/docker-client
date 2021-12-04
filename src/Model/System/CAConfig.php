<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CAConfig
{
    #[SerializedName('NodeCertExpiry')]
    public ?int $nodeCertExpiry = null;

    #[SerializedName('ExternalCAs')]
    public array $externalCAs = [];

    #[SerializedName('SigningCACert')]
    public ?string $signingCACert = null;

    #[SerializedName('SigningCAKey')]
    public ?string $signingCAKey = null;

    #[SerializedName('ForceRotate')]
    public ?int $forceRotate = null;
}
