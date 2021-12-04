<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Event
{
    #[SerializedName('Type')]
    public ?string $type = null;

    #[SerializedName('Action')]
    public ?string $action = null;

    #[SerializedName('Actor')]
    public ?Actor $actor = null;

    #[SerializedName('time')]
    public ?int $time = null;

    #[SerializedName('timeNano')]
    public ?int $timeNano = null;
}
