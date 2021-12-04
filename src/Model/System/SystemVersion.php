<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SystemVersion
{
    #[SerializedName('Platform')]
    public ?Platform $platform = null;

    #[SerializedName('Components')]
    public array $components = [];

    #[SerializedName('Version')]
    public ?string $version = null;

    #[SerializedName('ApiVersion')]
    public ?string $apiVersion = null;

    #[SerializedName('MinAPIVersion')]
    public ?string $minAPIVersion = null;

    #[SerializedName('GitCommit')]
    public ?string $gitCommit = null;

    #[SerializedName('GoVersion')]
    public ?string $goVersion = null;

    #[SerializedName('Os')]
    public ?string $os = null;

    #[SerializedName('Arch')]
    public ?string $arch = null;

    #[SerializedName('KernelVersion')]
    public ?string $kernelVersion = null;

    #[SerializedName('Experimental')]
    public ?bool $experimental = false;

    #[SerializedName('BuildTime')]
    public ?\DateTimeInterface $buildTime = null;
}
