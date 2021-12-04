<?php

namespace j4nr6n\DockerClient\Tests\Api;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ApiTestCase extends TestCase
{
    protected ?SerializerInterface $serializer = null;

    protected function getSerializer(): SerializerInterface
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
