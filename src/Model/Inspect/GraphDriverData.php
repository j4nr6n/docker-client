<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GraphDriverData
{
    #[SerializedName('Name')]
    public ?string $name = null;

    #[SerializedName('Data')]
    public array $data = [];
}
