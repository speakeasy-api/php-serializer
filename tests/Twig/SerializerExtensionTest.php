<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Twig;

use Speakeasy\Serializer\Twig\SerializerExtension;
use Speakeasy\Serializer\Twig\SerializerRuntimeExtension;
use Speakeasy\Serializer\Twig\SerializerRuntimeHelper;
use PHPUnit\Framework\TestCase;
use Twig\TwigFilter;
use Twig\TwigFunction;

class SerializerExtensionTest extends TestCase
{
    public function testSerialize()
    {
        $mockSerializer = $this->getMockBuilder('Speakeasy\Serializer\SerializerInterface')->getMock();
        $obj = new \stdClass();
        $mockSerializer
            ->expects($this->once())
            ->method('serialize')
            ->with($this->equalTo($obj), $this->equalTo('json'));
        $serializerExtension = new SerializerExtension($mockSerializer);
        $serializerExtension->serialize($obj);

        self::assertEquals('jms_serializer', $serializerExtension->getName());

        $filters = $serializerExtension->getFilters();
        self::assertInstanceOf(TwigFilter::class, $filters[0]);
        self::assertSame('serialize', $filters[0]->getName());

        self::assertEquals(
            [new TwigFunction('serialization_context', '\Speakeasy\Serializer\SerializationContext::create')],
            $serializerExtension->getFunctions(),
        );
    }

    public function testSerializeWithPrefix()
    {
        $mockSerializer = $this->getMockBuilder('Speakeasy\Serializer\SerializerInterface')->getMock();
        $obj = new \stdClass();
        $mockSerializer
            ->expects($this->once())
            ->method('serialize')
            ->with($this->equalTo($obj), $this->equalTo('json'));
        $serializerExtension = new SerializerExtension($mockSerializer, 'foo_');
        $serializerExtension->serialize($obj);

        self::assertEquals('jms_serializer', $serializerExtension->getName());

        $filters = $serializerExtension->getFilters();
        self::assertInstanceOf(TwigFilter::class, $filters[0]);
        self::assertSame('foo_serialize', $filters[0]->getName());

        self::assertEquals(
            [new TwigFunction('foo_serialization_context', '\Speakeasy\Serializer\SerializationContext::create')],
            $serializerExtension->getFunctions(),
        );
    }

    public function testRuntimeSerializerHelper()
    {
        $obj = new \stdClass();

        $mockSerializer = $this->getMockBuilder('Speakeasy\Serializer\SerializerInterface')->getMock();
        $mockSerializer
            ->expects($this->once())
            ->method('serialize')
            ->with($this->equalTo($obj), $this->equalTo('json'));

        $serializerExtension = new SerializerRuntimeHelper($mockSerializer);
        $serializerExtension->serialize($obj);
    }

    public function testRuntimeSerializerExtension()
    {
        $serializerExtension = new SerializerRuntimeExtension();

        self::assertEquals('jms_serializer', $serializerExtension->getName());
        self::assertEquals(
            [new TwigFilter('serialize', [SerializerRuntimeHelper::class, 'serialize'])],
            $serializerExtension->getFilters(),
        );
        self::assertEquals(
            [new TwigFunction('serialization_context', '\Speakeasy\Serializer\SerializationContext::create')],
            $serializerExtension->getFunctions(),
        );
    }
}
