<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class HealthcheckResult
{
    #[SerializedName('Start')]
    public ?\DateTimeInterface $start = null;

    #[SerializedName('End')]
    public ?\DateTimeInterface $end = null;

    #[SerializedName('ExitCode')]
    public ?int $exitCode = null;

    #[SerializedName('Output')]
    public ?string $output = null;
}
