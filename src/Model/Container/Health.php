<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Health
{
    #[SerializedName('Status')]
    public ?string $status = null;

    #[SerializedName('FailingStreak')]
    public ?int $failingStreak = null;

    /** @var HealthcheckResult[] */
    #[SerializedName('Log')]
    public array $log = [];
}
