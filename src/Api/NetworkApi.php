<?php

namespace j4nr6n\DockerClient\Api;

use j4nr6n\DockerClient\Exception\DockerException;
use j4nr6n\DockerClient\Exception\DockerExceptionInterface;
use j4nr6n\DockerClient\Exception\Http\ForbiddenException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use j4nr6n\DockerClient\Model\Network\CreateNetworkResponse;
use j4nr6n\DockerClient\Model\Network\Network;
use j4nr6n\DockerClient\Model\Network\NetworkPruneResponse;

class NetworkApi extends AbstractApi
{
    /**
     * @return Network[]
     *
     * @throws DockerExceptionInterface
     */
    public function list(string $filters = null): array
    {
        try {
            $response = $this->httpClient->request('GET', 'networks', [
                'query' => ['filters' => $filters],
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var Network[] */
        return $this->deserializeResponse($response, Network::class . '[]');
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function create(string $name, bool $checkDuplicate = true): CreateNetworkResponse
    {
        try {
            $response = $this->httpClient->request('POST', 'networks/create', [
                'json' => [
                    'Name' => $name,
                    'CheckDuplicate' => $checkDuplicate,
                ],
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var CreateNetworkResponse */
        return $this->deserializeResponse($response, CreateNetworkResponse::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function inspect(string $networkId, string $scope = null, bool $verbose = false): Network
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('networks/%s', $networkId), [
                'query' => ['verbose' => $verbose, 'scope' => $scope],
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var Network */
        return $this->deserializeResponse($response, Network::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function connectContainer(string $networkId, string $containerId): void
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('networks/%s/connect', $networkId), [
                'json' => ['Container' => $containerId],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \RuntimeException('Invalid response received from Docker');
            }
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function disconnectContainer(string $networkId, string $containerId, bool $force = false): void
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('networks/%s/connect', $networkId), [
                'json' => ['Container' => $containerId, 'Force' => $force],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \RuntimeException('Invalid response received from Docker');
            }
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function remove(string $networkId): void
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('networks/%s', $networkId));
            $responseStatusCode = $response->getStatusCode();
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        if ($responseStatusCode === 403) {
            throw new ForbiddenException(sprintf('Cannot remove pre-defined network: "%s".', $networkId));
        }

        if ($responseStatusCode === 404) {
            throw new NotFoundException(sprintf('Unknown network: "%s"', $networkId));
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function prune(): NetworkPruneResponse
    {
        try {
            $response = $this->httpClient->request('POST', 'networks/prune');
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var NetworkPruneResponse */
        return $this->deserializeResponse($response, NetworkPruneResponse::class);
    }
}
