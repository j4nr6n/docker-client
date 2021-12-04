<?php

namespace j4nr6n\DockerClient\Model\Network;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateNetworkResponse
{
    #[SerializedName('Id')]
    public ?string $id = null;

    #[SerializedName('Warning')]
    public ?string $warning = null;
}
