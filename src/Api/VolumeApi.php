<?php

namespace j4nr6n\DockerClient\Api;

use j4nr6n\DockerClient\Exception\DockerException;
use j4nr6n\DockerClient\Exception\DockerExceptionInterface;
use j4nr6n\DockerClient\Exception\Http\ConflictException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use j4nr6n\DockerClient\Model\Volume\Volume;
use j4nr6n\DockerClient\Model\Volume\VolumeListResponse;
use j4nr6n\DockerClient\Model\Volume\VolumePruneResponse;

class VolumeApi extends AbstractApi
{
    /**
     * @return Volume[]
     *
     * @throws DockerExceptionInterface
     */
    public function list(string $filters = null): array
    {
        try {
            $response = $this->httpClient->request('GET', 'volumes', [
                'query' => ['filters' => $filters],
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var VolumeListResponse */
        $volumeListResponse = $this->deserializeResponse($response, VolumeListResponse::class);

        return $volumeListResponse->volumes;
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function create(string $name, string $driver = 'local'): Volume
    {
        try {
            $response = $this->httpClient->request('POST', 'volumes/create', [
                'json' => [
                    'Name' => $name,
                    'Driver' => $driver,
                ],
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var Volume */
        return $this->deserializeResponse($response, Volume::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function inspect(string $volumeName): Volume
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('volumes/%s', $volumeName));
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var Volume */
        return $this->deserializeResponse($response, Volume::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function remove(string $volumeName): void
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('volumes/%s', $volumeName));
            $responseStatusCode = $response->getStatusCode();
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        if ($responseStatusCode === 404) {
            throw new NotFoundException(sprintf('Unknown volume: "%s"', $volumeName));
        }

        if ($responseStatusCode === 409) {
            throw new ConflictException(
                sprintf('Volume is in use and cannot be removed. "%s"', $volumeName)
            );
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function prune(): VolumePruneResponse
    {
        try {
            $response = $this->httpClient->request('POST', 'volumes/prune');
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var VolumePruneResponse */
        return $this->deserializeResponse($response, VolumePruneResponse::class);
    }
}
