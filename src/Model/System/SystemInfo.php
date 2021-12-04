<?php

namespace j4nr6n\DockerClient\Model\System;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SystemInfo
{
    #[SerializedName('ID')]
    public ?string $id = null;

    #[SerializedName('Containers')]
    public ?int $containers = null;

    #[SerializedName('ContainersRunning')]
    public ?int $runningContainers = null;

    #[SerializedName('ContainersPaused')]
    public ?int $pausedContainers = null;

    #[SerializedName('ContainersStopped')]
    public ?int $stoppedContainers = null;

    #[SerializedName('Images')]
    public ?int $images = null;

    #[SerializedName('Driver')]
    public ?string $driver = null;

    #[SerializedName('DriverStatus')]
    public array $driverStatus = [];

    #[SerializedName('DockerRootDir')]
    public ?string $rootDir = null;

    #[SerializedName('Plugins')]
    public array $plugins = [];

    #[SerializedName('MemoryLimit')]
    public ?bool $memoryLimit = null;

    #[SerializedName('SwapLimit')]
    public ?bool $swapLimit = null;

    #[SerializedName('KernelMemory')]
    public ?bool $kernelMemory = null;

    #[SerializedName('CpuCfsPeriod')]
    public ?bool $cpuCfsPeriod = null;

    #[SerializedName('CpuCfsQuota')]
    public ?bool $cpuCfsQuota = null;

    #[SerializedName('CPUShares')]
    public ?bool $cpuShares = null;

    #[SerializedName('CPUSet')]
    public ?bool $cpuSet = null;

    #[SerializedName('PidsLimit')]
    public ?bool $pidsLimit = null;

    #[SerializedName('OomKillDisable')]
    public ?bool $oomKillDisabled = null;

    #[SerializedName('IPv4Forwarding')]
    public ?bool $ipv4Forwarding  = null;

    #[SerializedName('BridgeNfIptables')]
    public ?bool $bridgeNfIptables = null;

    #[SerializedName('BridgeNfIp6tables')]
    public ?bool $bridgeNfIp6tables = null;

    #[SerializedName('Debug')]
    public ?bool $debug = null;

    #[SerializedName('NFd')]
    public ?int $nfd = null;

    #[SerializedName('NGoroutines')]
    public ?int $nGoroutines = null;

    #[SerializedName('SystemTime')]
    public ?\DateTimeInterface $systemTime = null;

    #[SerializedName('LoggingDriver')]
    public ?string $loggingDriver = null;

    #[SerializedName('CgroupDriver')]
    public ?string $cgroupDriver = null;

    #[SerializedName('CgroupVersion')]
    public ?string $cgroupVersion = null;

    #[SerializedName('NEventsListener')]
    public ?int $nEventsListener = null;

    #[SerializedName('KernelVersion')]
    public ?string $kernelVersion = null;

    #[SerializedName('OperatingSystem')]
    public ?string $operatingSystem = null;

    #[SerializedName('OSVersion')]
    public ?string $osVersion = null;

    #[SerializedName('OSType')]
    public ?string $osType = null;

    #[SerializedName('Architecture')]
    public ?string $architecture = null;

    #[SerializedName('NCPU')]
    public ?int $nCpu = null;

    #[SerializedName('MemTotal')]
    public ?int $memTotal = null;

    #[SerializedName('IndexServerAddress')]
    public ?string $indexServerAddress = null;

    #[SerializedName('RegistryConfig')]
    public ?RegistryServiceConfig $registryConfig = null;

    #[SerializedName('GenericResources')]
    public ?array $genericResources = null;

    #[SerializedName('HttpProxy')]
    public ?string $httpProxy = null;

    #[SerializedName('HttpsProxy')]
    public ?string $httpsProxy = null;

    #[SerializedName('NoProxy')]
    public ?string $noProxy = null;

    #[SerializedName('Name')]
    public ?string $name = null;

    /** @var string[] */
    #[SerializedName('Labels')]
    public array $labels = [];

    #[SerializedName('ExperimentalBuild')]
    public ?bool $experimentalBuild = null;

    #[SerializedName('ServerVersion')]
    public ?string $serverVersion = null;

    #[SerializedName('ClusterStore')]
    public ?string $clusterStore = null;

    #[SerializedName('ClusterAdvertise')]
    public ?string $clusterAdvertise = null;

    #[SerializedName('Runtimes')]
    public array $runtimes = [];

    #[SerializedName('DefaultRuntime')]
    public ?string $defaultRuntime = null;

    #[SerializedName('SwarmInfo')]
    public ?SwarmInfo $swarmInfo = null;

    #[SerializedName('LiveRestoreEnabled')]
    public ?bool $liveRestoreEnabled = null;

    #[SerializedName('Isolation')]
    public ?string $isolation = null;

    #[SerializedName('InitBinary')]
    public ?string $initBinary = null;

    #[SerializedName('ContainerdCommit')]
    public ?Commit $containerdCommit = null;

    #[SerializedName('RuncCommit')]
    public ?Commit $runcCommit = null;

    #[SerializedName('InitCommit')]
    public ?Commit $initCommit = null;

    /** @var string[] */
    #[SerializedName('SecurityOptions')]
    public array $securityOptions = [];

    #[SerializedName('ProductLicense')]
    public ?string $productLicense = null;

    #[SerializedName('DefaultAddressPools')]
    public array $defaultAddressPools = [];

    #[SerializedName('Warnings')]
    public array $warnings = [];
}
