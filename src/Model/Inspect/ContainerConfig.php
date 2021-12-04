<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ContainerConfig
{
    #[SerializedName('Hostname')]
    public ?string $hostname = null;

    #[SerializedName('Domainname')]
    public ?string $domainName = null;

    #[SerializedName('User')]
    public ?string $user = null;

    #[SerializedName('AttachStdin')]
    public ?bool $attachStdin = null;

    #[SerializedName('AttachStdout')]
    public ?bool $attachStdout = null;

    #[SerializedName('AttachStderr')]
    public ?bool $attachStderr = null;

    #[SerializedName('ExposedPorts')]
    public array $expodedPorts = [];

    #[SerializedName('Tty')]
    public ?bool $tty = null;

    #[SerializedName('OpenStdin')]
    public ?bool $openStdin = null;

    #[SerializedName('StdinOnce')]
    public ?bool $tdinOnce = null;

    /** @var string[] */
    #[SerializedName('Env')]
    public array $env = [];

    /** @var string[] */
    #[SerializedName('Cmd')]
    public array $cmd = [];

    #[SerializedName('HealthCheck')]
    public ?HealthConfig $healthCheck = null;

    #[SerializedName('ArgsEscaped')]
    public ?bool $argsEscaped = null;

    #[SerializedName('Image')]
    public ?string $image = null;

    #[SerializedName('Volumes')]
    public ?array $volumes = null;

    #[SerializedName('WorkingDir')]
    public ?string $workingDir = null;

    /** @var string[]|null */
    #[SerializedName('Entrypoint')]
    public ?array $entryPoint = null;

    #[SerializedName('NetworkDisabled')]
    public ?bool $networkDisabled = null;

    #[SerializedName('MacAddress')]
    public ?string $macAddress = null;

    /** @var string[]|null */
    #[SerializedName('OnBuild')]
    public ?array $onBuild = null;

    /** @var string[]|null */
    #[SerializedName('Labels')]
    public ?array $labels = null;

    #[SerializedName('StopSignal')]
    public ?string $stopSignal = null;

    #[SerializedName('StopTimeout')]
    public ?string $stopTimeout = null;

    /** @var string[] */
    #[SerializedName('Shell')]
    public array $shell = [];
}
