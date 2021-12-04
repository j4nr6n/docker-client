<?php

namespace j4nr6n\DockerClient\Api;

use j4nr6n\DockerClient\Exception\DockerException;
use j4nr6n\DockerClient\Exception\DockerExceptionInterface;
use j4nr6n\DockerClient\Model\System\CheckAuthResponse;
use j4nr6n\DockerClient\Model\System\Event;
use j4nr6n\DockerClient\Model\System\Ping;
use j4nr6n\DockerClient\Model\System\SystemDataUsage;
use j4nr6n\DockerClient\Model\System\SystemInfo;
use j4nr6n\DockerClient\Model\System\SystemVersion;

class SystemApi extends AbstractApi
{
    /**
     * @throws DockerExceptionInterface
     */
    public function checkAuth(
        string $username = null,
        string $password = null,
        string $email = null,
        string $serverAddress = null
    ): ?CheckAuthResponse {
        try {
            $response = $this->httpClient->request('POST', 'auth', [
                'json' => [
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'serveraddress' => $serverAddress,
                ]
            ]);

            if ($response->getStatusCode() === 204) {
                return null;
            }
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var CheckAuthResponse */
        return $this->deserializeResponse($response, CheckAuthResponse::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function info(): SystemInfo
    {
        try {
            $response = $this->httpClient->request('GET', 'info');
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var SystemInfo */
        return $this->deserializeResponse($response, SystemInfo::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function version(): SystemVersion
    {
        try {
            $response = $this->httpClient->request('GET', 'version');
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var SystemVersion */
        return $this->deserializeResponse($response, SystemVersion::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function ping(): Ping
    {
        try {
            $headers = $this->httpClient
                ->request('HEAD', '_ping')
                ->getHeaders();
        } catch (\Throwable $exception) {
            throw new DockerException('Could not ping docker engine', $exception);
        }

        $apiVersion = (string) array_shift($headers['api-version']);
        $osType = (string) array_shift($headers['ostype']);
        $isExperimental = array_shift($headers['docker-experimental']) === 'true';

        return new Ping($osType, $apiVersion, $isExperimental);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function events(): \Generator
    {
        try {
            $response = $this->httpClient->request('GET', 'events');

            if ($response->getStatusCode() !== 200) {
                throw new \RuntimeException('Invalid response received from Docker');
            }
        } catch (\Throwable $exception) {
            throw new DockerException('Unknown error retrieving events from Docker', $exception);
        }

        try {
            foreach ($this->httpClient->stream($response) as $chunk) {
                /** @var Event */
                yield $this->deserializeString($chunk->getContent(), Event::class);
            }
        } catch (\Throwable $exception) {
            throw new DockerException('Unknown error retrieving events from Docker', $exception);
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function df(): SystemDataUsage
    {
        try {
            $response = $this->httpClient->request('GET', 'system/df');
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var SystemDataUsage */
        return $this->deserializeResponse($response, SystemDataUsage::class);
    }
}
