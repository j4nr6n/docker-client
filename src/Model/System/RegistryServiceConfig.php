<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RegistryServiceConfig
{
    #[SerializedName('AllowNondistributableArtifactsCIDRs')]
    public array $allowNondistributableArtifactsCIDRs = [];

    #[SerializedName('AllowNondistributableArtifactsHostnames')]
    public array $allowNondistributableArtifactsHostnames = [];

    #[SerializedName('InsecureRegistryCIDRs')]
    public array $insecureRegistryCIDRs = [];

    #[SerializedName('IndexConfigs')]
    public array $indexConfigs = [];

    /** @var string[] */
    #[SerializedName('Mirrors')]
    public array $mirrors = [];
}
