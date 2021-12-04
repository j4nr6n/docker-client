<?php

namespace j4nr6n\DockerClient;

use j4nr6n\DockerClient\Api;
use j4nr6n\DockerClient\Exception\DockerException;
use j4nr6n\DockerClient\Model\System\SystemInfo;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client
{
    private string $engineUrl;
    private ?string $engineInterface;

    private ?HttpClientInterface $httpClient = null;
    private ?SerializerInterface $serializer = null;

    public function __construct(
        string $engineUrl = 'http://localhost',
        ?string $engineInterface = '/var/run/docker.sock'
    ) {
        $this->engineUrl = $engineUrl;
        $this->engineInterface = $engineInterface;
    }

    public function setHttpClient(HttpClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient->withOptions([
            'base_uri' => $this->getBaseUrl(),
            'bindto' => $this->engineInterface,
        ]);

        return $this;
    }

    public function setSerializer(SerializerInterface $serializer): self
    {
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * @throws DockerException
     */
    public function info(): SystemInfo
    {
        return $this->system()->info();
    }

    public function containers(): Api\ContainerApi
    {
        return new Api\ContainerApi($this->getHttpClient(), $this->getSerializer());
    }

    public function images(): Api\ImageApi
    {
        return new Api\ImageApi($this->getHttpClient(), $this->getSerializer());
    }

    public function networks(): Api\NetworkApi
    {
        return new Api\NetworkApi($this->getHttpClient(), $this->getSerializer());
    }

    public function volumes(): Api\VolumeApi
    {
        return new Api\VolumeApi($this->getHttpClient(), $this->getSerializer());
    }

    public function exec(): Api\ExecApi
    {
        return new Api\ExecApi($this->getHttpClient(), $this->getSerializer());
    }

    public function system(): Api\SystemApi
    {
        return new Api\SystemApi($this->getHttpClient(), $this->getSerializer());
    }

    private function getBaseUrl(): string
    {
        $url = parse_url($this->engineUrl);

        // Ensure that the path ends with a `/`
        $url['path'] = !empty($url['path'])
            ? rtrim($url['path'], '/') . '/'
            : '/';

        return sprintf(
            '%s://%s%s',
            $url['scheme'] ?? 'http',
            $url['host'] ?? 'localhost',
            $url['path']
        );
    }

    private function getHttpClient(): HttpClientInterface
    {
        if ($this->httpClient) {
            return $this->httpClient;
        }

        $this->httpClient = HttpClient::create([
            'headers' => [],
            'max_redirects' => 3,
            'base_uri' => $this->getBaseUrl(),
            'bindto' => $this->engineInterface,
        ]);

        return $this->httpClient;
    }

    private function getSerializer(): SerializerInterface
    {
        if ($this->serializer) {
            return $this->serializer;
        }

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader());
        $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $normalizers = [new ObjectNormalizer($classMetadataFactory, $nameConverter)];
        $encoders = [new JsonEncoder() ];

        $this->serializer = new Serializer($normalizers, $encoders);

        return $this->serializer;
    }
}
