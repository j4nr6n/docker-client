<?php

namespace j4nr6n\DockerClient\Model\Inspect;

use j4nr6n\DockerClient\Model\Container\Mount;
use Symfony\Component\Serializer\Annotation\SerializedName;

class HostConfig
{
    #[SerializedName('CpuShares')]
    public ?int $cpuShares = null;

    #[SerializedName('Memory')]
    public ?int $memory = null;

    #[SerializedName('CgroupParent')]
    public ?string $cgroupParent = null;

    #[SerializedName('BlkioWeight')]
    public ?int $blkioWeight = null;

    #[SerializedName('BlkioWeightDevice')]
    public array $blkioWeightDevice = [];

    // /** @var ThrottleDevice[] */
    // #[SerializedName('BlkioDeviceReadBps')]
    // public array  $blkioDeviceReadBps  = [];

    // /** @var ThrottleDevice[] */
    // #[SerializedName('BlkioDeviceWriteBps')]
    // public array $blkioDeviceWriteBps = [];

    // /** @var ThrottleDevice[] */
    // #[SerializedName('BlkioDeviceReadIOps')]
    // public array $blkioDeviceReadIOps = [];

    // /** @var ThrottleDevice[] */
    // #[SerializedName('BlkioDeviceWriteIOps')]
    // public array $blkioDeviceWriteIOps = [];

    #[SerializedName('CpuPeriod')]
    public ?int $cpuPeriod = null;

    #[SerializedName('CpuQuota')]
    public ?int $cpuQuota = null;

    #[SerializedName('CpuRealtimePeriod')]
    public ?int $cpuRealtimePeriod = null;

    #[SerializedName('CpuRealtimeRuntime')]
    public ?int $cpuRealtimeRuntime = null;

    #[SerializedName('CpusetCpus')]
    public ?string $cpusetCpus = null;

    #[SerializedName('CpusetMems')]
    public ?string $cpusetMems = null;

    // /** @var DeviceMapping[] */
    // #[SerializedName('Devices')]
    // public array $devices = [];

    /** @var string[]|null */
    #[SerializedName('DeviceCgroupRules')]
    public ?array $deviceCgroupRules = null;

    // /** @var DeviceRequest[] */
    // #[SerializedName('DeviceRequests')]
    // public array $deviceRequests = [];

    #[SerializedName('KernelMemory')]
    public ?int $kernelMemory = null;

    #[SerializedName('KernelMemoryTCP')]
    public ?int $kernelMemoryTCP = null;

    #[SerializedName('MemoryReservation')]
    public ?int $memoryReservation = null;

    #[SerializedName('MemorySwap')]
    public ?int $memorySwap = null;

    #[SerializedName('MemorySwappiness')]
    public ?int $memorySwappiness = null;

    #[SerializedName('NanoCpus')]
    public ?int $nanoCpus = null;

    #[SerializedName('OomKillDisable')]
    public ?bool $oomKillDisable = null;

    #[SerializedName('Init')]
    public ?bool $init = null;

    #[SerializedName('PidsLimit')]
    public ?int $pidsLimit = null;

    /** @var string[]|null */
    #[SerializedName('Ulimits')]
    public ?array $ulimits = null;

    #[SerializedName('CpuCount')]
    public ?int $cpuCount = null;

    #[SerializedName('CpuPercent')]
    public ?int $cpuPercent = null;

    #[SerializedName('IOMaximumIOps')]
    public ?int $ioMaximumIOps = null;

    #[SerializedName('IOMaximumBandwidth')]
    public ?int $ioMaximumBandwidth = null;

    /** @var string[]|null */
    #[SerializedName('Binds')]
    public ?array $binds = null;

    #[SerializedName('ContainerIDFile')]
    public ?string $containerIDFile = null;

    // #[SerializedName('LogConfig')]
    // public ?LogConfig $logConfig = null;

    #[SerializedName('NetworkMode')]
    public ?string $networkMode = null;

    // #[SerializedName('PortBindings')]
    // public ?PortMap $portBindings = null;

    // #[SerializedName('RestartPolicy')]
    // public ?RestartPolicy $restartPolicy = null;

    #[SerializedName('AutoRemove')]
    public ?bool $autoRemove = null;

    #[SerializedName('VolumeDriver')]
    public ?string $volumeDriver = null;

    #[SerializedName('VolumesFrom')]
    public ?array $volumesFrom = null;

    /** @var Mount[] */
    #[SerializedName('Mounts')]
    public array $mounts = [];

    /** @var string[]|null */
    #[SerializedName('CapAdd')]
    public ?array $capAdd = null;

    /** @var string[]|null */
    #[SerializedName('CapDrop')]
    public ?array $capDrop = null;

    #[SerializedName('CgroupnsMode')]
    public ?string $cgroupnsMode = null;

    /** @var string[]|null */
    #[SerializedName('Dns')]
    public ?array $dns = null;

    /** @var string[] */
    #[SerializedName('DnsOptions')]
    public array $dnsOptions = [];

    /** @var string[] */
    #[SerializedName('DnsSearch')]
    public array $dnsSearch = [];

    /** @var string[]|null */
    #[SerializedName('ExtraHosts')]
    public ?array $extraHosts = null;

    /** @var string[]|null */
    #[SerializedName('GroupAdd')]
    public ?array $groupAdd = null;

    #[SerializedName('IpcMode')]
    public ?string $ipcMode = null;

    #[SerializedName('Cgroup')]
    public ?string $cgroup = null;

    /** @var string[]|null */
    #[SerializedName('Links')]
    public ?array $links = null;

    #[SerializedName('OomScoreAdj')]
    public ?int $oomScoreAdj = null;

    #[SerializedName('PidMode')]
    public ?string $pidMode = null;

    #[SerializedName('Privileged')]
    public ?bool $privileged = null;

    #[SerializedName('PublishAllPorts')]
    public ?bool $publishAllPorts = null;

    #[SerializedName('ReadonlyRootfs')]
    public ?bool $readonlyRootfs = null;

    /** @var string[]|null */
    #[SerializedName('SecurityOpt')]
    public ?array $securityOpt = null;

    // #[SerializedName('StorageOpt')]
    // public ?StorageOpt $storageOpt = null;

    // #[SerializedName('Tmpfs')]
    // public ?Tmpfs $tmpfs = null;

    #[SerializedName('UTSMode')]
    public ?string $utsMode = null;

    #[SerializedName('UsernsMode')]
    public ?string $usernsMode = null;

    #[SerializedName('ShmSize')]
    public ?int $shmSize = null;

    // #[SerializedName('Sysctls')]
    // public ?Sysctls $sysctls = null;

    #[SerializedName('Runtime')]
    public ?string $runtime = null;

    /** @var int[] */
    #[SerializedName('ConsoleSize')]
    public array $consoleSize = [];

    #[SerializedName('Isolation')]
    public ?string $isolation = null;

    /** @var string[] */
    #[SerializedName('MaskedPaths')]
    public array $maskedPaths = [];

    /** @var string[] */
    #[SerializedName('ReadonlyPaths')]
    public array $readonlyPaths = [];
}
