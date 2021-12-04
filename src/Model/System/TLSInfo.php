<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class TLSInfo
{
    #[SerializedName('TrustRoot')]
    public ?string $trustRoot = null;

    #[SerializedName('CertIssuerSubject')]
    public ?string $certIssuerSubject = null;

    #[SerializedName('CertIssuerPublicKey')]
    public ?string $certIssuerPublicKey = null;
}
