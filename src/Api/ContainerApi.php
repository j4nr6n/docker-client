<?php

namespace j4nr6n\DockerClient\Api;

use j4nr6n\DockerClient\Exception\DockerException;
use j4nr6n\DockerClient\Exception\DockerExceptionInterface;
use j4nr6n\DockerClient\Exception\Http\ConflictException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use j4nr6n\DockerClient\Exception\InvalidValueException;
use j4nr6n\DockerClient\Model\Container\Container;
use j4nr6n\DockerClient\Model\Container\ContainerInspect;
use j4nr6n\DockerClient\Model\Container\ContainerPruneResponse;
use j4nr6n\DockerClient\Model\Container\CreateContainerResponse;
use j4nr6n\DockerClient\Model\Container\FilesystemChange;
use j4nr6n\DockerClient\Model\Container\Top;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;

class ContainerApi extends AbstractApi
{
    /**
     * @return Container[]
     *
     * @throws DockerExceptionInterface
     */
    public function list(
        bool $all = false,
        int $limit = null,
        bool $size = false,
        string $filters = null
    ): array {
        $queryParams = [
            'limit' => $limit,
            'size' => $size,
            'filters' => $filters,
        ];

        // Docker doesn't seem to care if `all` is `true` or `false`. If it's set, everything is returned.
        if ($all) {
            $queryParams['all'] = true;
        }

        try {
            $response = $this->httpClient->request('GET', 'containers/json', [
                'query' => $queryParams,
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var Container[] */
        return $this->deserializeResponse($response, Container::class . '[]');
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function create(string $name = null, array $options = []): CreateContainerResponse
    {
        $queryParams = [];
        if ($name) {
            if (!preg_match('/^\/?[a-zA-Z0-9][a-zA-Z0-9_.-]+$/', $name)) {
                throw new InvalidValueException(
                    sprintf('Container names may only container [a-zA-Z0-9_.-]. "%s" given', $name)
                );
            }

            $queryParams['name'] = $name;
        }

        try {
            $response = $this->httpClient->request('POST', 'containers/create', [
                'query' => $queryParams,
                'json' => $options,
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var CreateContainerResponse */
        return $this->deserializeResponse($response, CreateContainerResponse::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function inspect(string $containerId): ContainerInspect
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('containers/%s/json', $containerId), [
                'query' => ['size' => true],
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var ContainerInspect */
        return $this->deserializeResponse($response, ContainerInspect::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function top(string $containerId): Top
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('containers/%s/top', $containerId));
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var Top */
        return $this->deserializeResponse($response, Top::class);
    }

    /**
     * @return FilesystemChange[]
     *
     * @throws DockerExceptionInterface
     */
    public function changes(string $containerId): array
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('containers/%s/changes', $containerId));
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var FilesystemChange[] */
        return $this->deserializeResponse($response, FilesystemChange::class . '[]');
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function start(string $containerId): void
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('containers/%s/start', $containerId));

            // 204 = Success, 304 = Already Running
            if (!in_array($response->getStatusCode(), [204, 304])) {
                $responseContent = $response->toArray(false);

                /** @var string $error */
                $error = $responseContent['message'] ?? 'An unknown error occurred';

                throw new DockerException($error);
            }
        } catch (ExceptionInterface $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function stop(string $containerId): void
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('containers/%s/stop', $containerId));

            // 204 = Success, 304 = Already Stopped
            if (!in_array($response->getStatusCode(), [204, 304])) {
                $responseContent = $response->toArray(false);

                /** @var string $error */
                $error = $responseContent['message'] ?? 'An unknown error occurred';

                throw new DockerException($error);
            }
        } catch (ExceptionInterface $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function restart(string $containerId): void
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('containers/%s/restart', $containerId));

            // 204 = Success
            if ($response->getStatusCode() !== 204) {
                $responseContent = $response->toArray(false);

                /** @var string $error */
                $error = $responseContent['message'] ?? 'An unknown error occurred';

                throw new DockerException($error);
            }
        } catch (ExceptionInterface $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function remove(string $containerId): void
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('container/%s', $containerId));
            $responseStatusCode = $response->getStatusCode();
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        if ($responseStatusCode === 404) {
            throw new NotFoundException(sprintf('Unknown container: "%s"', $containerId));
        }

        if ($responseStatusCode === 409) {
            throw new ConflictException(
                sprintf('Container is in use and cannot be removed. "%s"', $containerId)
            );
        }
    }

    /**
     * @throws DockerException
     */
    public function prune(): ContainerPruneResponse
    {
        try {
            $response = $this->httpClient->request('POST', 'images/prune');
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var ContainerPruneResponse */
        return $this->deserializeResponse($response, ContainerPruneResponse::class);
    }
}
