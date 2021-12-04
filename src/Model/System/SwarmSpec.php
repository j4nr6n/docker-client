<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SwarmSpec
{
    #[SerializedName('Name')]
    public ?string $name = null;

    #[SerializedName('Labels')]
    public array $labels = [];

    #[SerializedName('Orchestration')]
    public ?Orchestration $orchestration = null;

    #[SerializedName('Raft')]
    public ?Raft $raft = null;

    #[SerializedName('Dispatcher')]
    public ?Dispatcher $dispatcher = null;

    #[SerializedName('CAConfig')]
    public ?CAConfig $caConfig = null;

    #[SerializedName('EncryptionConfig')]
    public ?EncryptionConfig $encryptionConfig = null;

    #[SerializedName('TaskDefaults')]
    public ?TaskDefaults $taskDefaults = null;
}
