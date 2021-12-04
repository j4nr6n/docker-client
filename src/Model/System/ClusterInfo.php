<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ClusterInfo
{
    #[SerializedName('ID')]
    public ?string $id = null;

    #[SerializedName('Version')]
    public ?ObjectVersion $version = null;

    #[SerializedName('CreatedAt')]
    public ?\DateTimeInterface $createdAt = null;

    #[SerializedName('UpdatedAt')]
    public ?\DateTimeInterface $updateAt = null;

    #[SerializedName('SwarmSpec')]
    public ?SwarmSpec $swarmSpec = null;

    #[SerializedName('TLSInfo')]
    public ?TLSInfo $tlsInfo = null;

    #[SerializedName('RootRotationInProgress')]
    public ?bool $rootRotationInProgress = null;

    #[SerializedName('DataPathPort')]
    public ?int $dataPathPort = null;

    /** @var string[] */
    #[SerializedName('DefaultAddrPool')]
    public array $defaultAddrPool = [];

    #[SerializedName('SubnetSize')]
    public ?int $subnetSize = null;
}
