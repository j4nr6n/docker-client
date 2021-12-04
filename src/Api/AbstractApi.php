<?php

namespace j4nr6n\DockerClient\Api;

use j4nr6n\DockerClient\Exception\DeserializationException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class AbstractApi implements ApiInterface
{
    protected HttpClientInterface $httpClient;
    protected SerializerInterface $serializer;

    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializer)
    {
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    protected function deserializeString(string $string, string $type, array $context = []): mixed
    {
        return $this->serializer->deserialize($string, $type, 'json', $context);
    }

    /**
     * @throws DeserializationException
     */
    protected function deserializeResponse(
        ResponseInterface $response,
        string $type,
        array $context = []
    ): mixed {
        try {
            $responseContent = $response->getContent();
        } catch (\Throwable $exception) {
            if ($exception instanceof HttpExceptionInterface) {
                try {
                    $responseContent = $exception->getResponse()->toArray(false);
                } catch (\Throwable) {
                    // Do nothing
                }

                /** @var string $message */
                $message = $responseContent['message'] ?? 'An unknown error occurred';

                throw new DeserializationException($message, $exception);
            }

            throw new DeserializationException('An unknown error occurred', $exception);
        }

        return $this->deserializeString($responseContent, $type, $context);
    }
}
