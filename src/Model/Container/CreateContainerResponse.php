<?php

namespace j4nr6n\DockerClient\Model\Container;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateContainerResponse
{
    #[SerializedName('Id')]
    public ?string $containerId = null;

    /** @var string[] */
    #[SerializedName('Warnings')]
    public array $warnings = [];
}
