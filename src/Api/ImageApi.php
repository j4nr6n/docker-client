<?php

namespace j4nr6n\DockerClient\Api;

use j4nr6n\DockerClient\Exception\DockerException;
use j4nr6n\DockerClient\Exception\DockerExceptionInterface;
use j4nr6n\DockerClient\Exception\Http\ConflictException;
use j4nr6n\DockerClient\Exception\Http\NotFoundException;
use j4nr6n\DockerClient\Model\Image\Image;
use j4nr6n\DockerClient\Model\Image\ImageInspect;
use j4nr6n\DockerClient\Model\Image\ImagePruneResponse;

class ImageApi extends AbstractApi
{
    /**
     * @return Image[]
     *
     * @throws DockerExceptionInterface
     */
    public function list(bool $all = false, string $filters = null, bool $digests = false): array
    {
        try {
            $response = $this->httpClient->request('GET', 'images/json', [
                'query' => [
                    'all' => $all,
                    'filters' => $filters,
                    'digests' => $digests,
                ],
            ]);
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var Image[] */
        return $this->deserializeResponse($response, Image::class . '[]');
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function inspect(string $imageName): ImageInspect
    {
        try {
            $response = $this->httpClient->request('GET', sprintf('images/%s/json', $imageName));
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var ImageInspect */
        return $this->deserializeResponse($response, ImageInspect::class);
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function remove(string $imageName): void
    {
        try {
            $response = $this->httpClient->request('DELETE', sprintf('image/%s', $imageName));
            $responseStatusCode = $response->getStatusCode();
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        if ($responseStatusCode === 404) {
            throw new NotFoundException(sprintf('Unknown image: "%s"', $imageName));
        }

        if ($responseStatusCode === 409) {
            throw new ConflictException(
                sprintf('Image is in use and cannot be removed. "%s"', $imageName)
            );
        }
    }

    /**
     * @throws DockerExceptionInterface
     */
    public function prune(): ImagePruneResponse
    {
        try {
            $response = $this->httpClient->request('POST', 'images/prune');
        } catch (\Throwable $exception) {
            throw new DockerException('An unknown error occurred', $exception);
        }

        /** @var ImagePruneResponse */
        return $this->deserializeResponse($response, ImagePruneResponse::class);
    }
}
