<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use Symfony\Component\Serializer\Annotation\SerializedName;

class HealthConfig
{
    /** @var string[] */
    #[SerializedName('Test')]
    public array $test = [];

    #[SerializedName('Interval')]
    public ?int $interval = null;

    #[SerializedName('Timeout')]
    public ?int $timeout = null;

    #[SerializedName('Retries')]
    public ?int $retries = null;

    #[SerializedName('StartPeriod')]
    public ?int $startPeriod = null;
}
