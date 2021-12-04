<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Top
{
    #[SerializedName('Titles')]
    public array $titles = [];

    #[SerializedName('Processes')]
    public array $processes = [];
}
