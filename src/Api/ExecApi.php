<?php

namespace j4nr6n\DockerClient\Api;

use j4nr6n\DockerClient\Exception\DockerException;
use j4nr6n\DockerClient\Exception\DockerExceptionInterface;
use j4nr6n\DockerClient\Exception\Http\ConflictException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;

class ExecApi extends AbstractApi
{
    /**
     * @throws DockerExceptionInterface
     */
    public function create(string $containerId, array $command = []): string
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('containers/%s/exec', $containerId), [
                'json' => [
                    'Cmd' => $command,
                ],
            ]);
            $responseStatusCode = $response->getStatusCode();
            $responseContent = $response->toArray();
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        if ($responseStatusCode === 404) {
            throw new NotFoundException(sprintf('Unknown container: "%s"', $containerId));
        }

        if ($responseStatusCode === 409) {
            throw new ConflictException(
                sprintf('Could not create exec instance. Container "%s" is stopped or paused.', $containerId)
            );
        }

        /** @var string */
        return $responseContent['Id'];
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function start(string $execId): void
    {
        try {
            $response = $this->httpClient->request('POST', sprintf('exec/%s/start', $execId), [
                'json' => [
                    'Detach' => true,
                    'Tty' => false,
                ],
            ]);
            $responseStatusCode = $response->getStatusCode();
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        if ($responseStatusCode === 404) {
            throw new NotFoundException(sprintf('Unknown exec instance: "%s"', $execId));
        }

        if ($responseStatusCode === 409) {
            throw new ConflictException(
                sprintf('Could not start exec "%s". Container is stopped or paused.', $execId)
            );
        }
    }
}
