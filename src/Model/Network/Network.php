<?php

namespace j4nr6n\DockerClient\Model\Network;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Network
{
    #[SerializedName('Id')]
    public ?string $id = null;

    #[SerializedName('Name')]
    public ?string $name = null;

    #[SerializedName('Created')]
    public ?\DateTimeInterface $created = null;

    #[SerializedName('Scope')]
    public ?string $scope = null;

    #[SerializedName('Driver')]
    public ?string $driver = null;

    #[SerializedName('EnableIPv6')]
    public ?bool $enableIpv6 = null;

    #[SerializedName('IPAM')]
    public array $ipam = [];

    #[SerializedName('Internal')]
    public ?bool $internal = null;

    #[SerializedName('Attachable')]
    public ?bool $attachable = null;

    #[SerializedName('Ingress')]
    public ?bool $ingress = null;

    #[SerializedName('Containers')]
    public array $containers = [];

    #[SerializedName('Options')]
    public array $options = [];

    #[SerializedName('Labels')]
    public array $labels = [];
}
