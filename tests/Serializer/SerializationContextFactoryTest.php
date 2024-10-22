<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use Speakeasy\Serializer\Construction\UnserializeObjectConstructor;
use Speakeasy\Serializer\ContextFactory\DeserializationContextFactoryInterface;
use Speakeasy\Serializer\ContextFactory\SerializationContextFactoryInterface;
use Speakeasy\Serializer\DeserializationContext;
use Speakeasy\Serializer\Handler\HandlerRegistry;
use Speakeasy\Serializer\Metadata\Driver\AnnotationDriver;
use Speakeasy\Serializer\Naming\CamelCaseNamingStrategy;
use Speakeasy\Serializer\Naming\SerializedNameAnnotationStrategy;
use Speakeasy\Serializer\SerializationContext;
use Speakeasy\Serializer\SerializerBuilder;
use Speakeasy\Serializer\Visitor\Factory\JsonDeserializationVisitorFactory;
use Speakeasy\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use Metadata\MetadataFactory;
use PHPUnit\Framework\TestCase;

class SerializationContextFactoryTest extends TestCase
{
    protected $serializer;
    protected $metadataFactory;
    protected $handlerRegistry;
    protected $unserializeObjectConstructor;
    protected $serializationVisitors;
    protected $deserializationVisitors;

    protected function setUp(): void
    {
        parent::setUp();

        $namingStrategy = new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy());
        $this->metadataFactory = new MetadataFactory(new AnnotationDriver(new AnnotationReader(), $namingStrategy));
        $this->handlerRegistry = new HandlerRegistry();
        $this->unserializeObjectConstructor = new UnserializeObjectConstructor();

        $this->serializationVisitors = ['json' => new JsonSerializationVisitorFactory()];
        $this->deserializationVisitors = ['json' => new JsonDeserializationVisitorFactory()];
    }

    public function testSerializeUseProvidedSerializationContext()
    {
        $contextFactoryMock = $this->createMock(SerializationContextFactoryInterface::class);
        $context = new SerializationContext();
        $context->setSerializeNull(true);

        $contextFactoryMock
            ->expects($this->once())
            ->method('createSerializationContext')
            ->willReturn($context);

        $builder = SerializerBuilder::create();
        $builder->setSerializationContextFactory($contextFactoryMock);
        $serializer = $builder->build();

        $result = $serializer->serialize(['value' => null], 'json');

        self::assertEquals('{"value":null}', $result);
    }

    public function testDeserializeUseProvidedDeserializationContext()
    {
        $contextFactoryMock = $this->createMock(DeserializationContextFactoryInterface::class);
        $context = new DeserializationContext();

        $contextFactoryMock
            ->expects($this->once())
            ->method('createDeserializationContext')
            ->willReturn($context);

        $builder = SerializerBuilder::create();
        $builder->setDeserializationContextFactory($contextFactoryMock);
        $serializer = $builder->build();

        $result = $serializer->deserialize('{"value":null}', 'array', 'json');

        self::assertEquals(['value' => null], $result);
    }

    public function testToArrayUseProvidedSerializationContext()
    {
        $contextFactoryMock = $this->createMock(SerializationContextFactoryInterface::class);
        $context = new SerializationContext();
        $context->setSerializeNull(true);

        $contextFactoryMock
            ->expects($this->once())
            ->method('createSerializationContext')
            ->willReturn($context);

        $builder = SerializerBuilder::create();
        $builder->setSerializationContextFactory($contextFactoryMock);
        $serializer = $builder->build();

        $result = $serializer->toArray(['value' => null]);

        self::assertEquals(['value' => null], $result);
    }

    public function testFromArrayUseProvidedDeserializationContext()
    {
        $contextFactoryMock = $this->createMock(DeserializationContextFactoryInterface::class);
        $context = new DeserializationContext();

        $contextFactoryMock
            ->expects($this->once())
            ->method('createDeserializationContext')
            ->willReturn($context);

        $builder = SerializerBuilder::create();
        $builder->setDeserializationContextFactory($contextFactoryMock);
        $serializer = $builder->build();

        $result = $serializer->fromArray(['value' => null], 'array');

        self::assertEquals(['value' => null], $result);
    }
}
