<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use j4nr6n\DockerClient\Model\Container\Health;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ContainerState
{
    #[SerializedName('Status')]
    public ?string $status = null;

    #[SerializedName('Running')]
    public ?bool $running = null;

    #[SerializedName('Paused')]
    public ?bool $paused = null;

    #[SerializedName('Restarting')]
    public ?bool $restarting = null;

    #[SerializedName('OOMKilled')]
    public ?bool $oomKilled = null;

    #[SerializedName('Dead')]
    public ?bool $dead = null;

    #[SerializedName('Pid')]
    public ?int $pid = null;

    #[SerializedName('ExitCode')]
    public ?int $exitCode = null;

    #[SerializedName('Error')]
    public ?string $error = null;

    #[SerializedName('StartedAt')]
    public ?\DateTimeInterface $startedAt = null;

    #[SerializedName('FinishedAt')]
    public ?\DateTimeInterface $finishedAt = null;

    #[SerializedName('Health')]
    public ?Health $health = null;
}
