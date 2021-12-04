<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use Symfony\Component\Serializer\Annotation\SerializedName;

class NetworkSettings
{
    #[SerializedName('Id')]
    public ?string $id = null;

    #[SerializedName(' Created')]
    public ?\DateTimeInterface $created = null;

    #[SerializedName('Path')]
    public ?string $path = null;

    /** @var string[] */
    #[SerializedName('Args')]
    public array $args = [];

    #[SerializedName('State')]
    public ?ContainerState $state = null;
}
