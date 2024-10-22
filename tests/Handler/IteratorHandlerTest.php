<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Handler;

use Speakeasy\Serializer\DeserializationContext;
use Speakeasy\Serializer\GraphNavigatorInterface;
use Speakeasy\Serializer\Handler\HandlerRegistry;
use Speakeasy\Serializer\Handler\IteratorHandler;
use Speakeasy\Serializer\SerializationContext;
use Speakeasy\Serializer\Visitor\DeserializationVisitorInterface;
use Speakeasy\Serializer\Visitor\SerializationVisitorInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class IteratorHandlerTest extends TestCase
{
    private const DATA = ['foo', 'bar'];

    /**
     * @var HandlerRegistry
     */
    private $handlerRegistry;

    public static function iteratorsProvider(): array
    {
        return [
            [
                new \ArrayIterator(self::DATA),
            ],
            [
                (static function (): \Generator {
                    yield 'foo';
                    yield 'bar';
                })(),
            ],
        ];
    }

    /**
     * @dataProvider iteratorsProvider
     */
    #[DataProvider('iteratorsProvider')]
    public function testSerialize(\Iterator $iterator): void
    {
        $type = get_class($iterator);
        $serializationHandler = $this->handlerRegistry->getHandler(
            GraphNavigatorInterface::DIRECTION_SERIALIZATION,
            $type,
            'json',
        );
        self::assertIsCallable($serializationHandler);

        $serialized = $serializationHandler(
            $this->createSerializationVisitor(),
            $iterator,
            ['name' => $type, 'params' => []],
            $this->getMockBuilder(SerializationContext::class)->getMock(),
        );
        self::assertSame(self::DATA, $serialized);

        $deserializationHandler = $this->handlerRegistry->getHandler(
            GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
            $type,
            'json',
        );
        self::assertIsCallable($deserializationHandler);

        $deserialized = $deserializationHandler(
            $this->createDeserializationVisitor(),
            $serialized,
            ['name' => $type, 'params' => []],
            $this->getMockBuilder(DeserializationContext::class)->getMock(),
        );
        self::assertEquals($iterator, $deserialized);
    }

    protected function setUp(): void
    {
        $this->handlerRegistry = new HandlerRegistry();
        $this->handlerRegistry->registerSubscribingHandler(new IteratorHandler());
    }

    private function createDeserializationVisitor(): DeserializationVisitorInterface
    {
        $visitor = $this->getMockBuilder(DeserializationVisitorInterface::class)->getMock();
        $visitor->method('visitArray')->with(self::DATA)->willReturn(self::DATA);

        return $visitor;
    }

    private function createSerializationVisitor(): SerializationVisitorInterface
    {
        $visitor = $this->getMockBuilder(SerializationVisitorInterface::class)->getMock();
        $visitor->method('visitArray')->with(self::DATA)->willReturn(self::DATA);

        return $visitor;
    }
}
