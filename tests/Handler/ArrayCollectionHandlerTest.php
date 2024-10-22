<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Handler;

use Doctrine\Common\Collections\ArrayCollection;
use Speakeasy\Serializer\Handler\ArrayCollectionHandler;
use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\SerializationContext;
use Speakeasy\Serializer\Tests\Fixtures\ExclusionStrategy\AlwaysExcludeExclusionStrategy;
use Speakeasy\Serializer\Visitor\SerializationVisitorInterface;
use Metadata\MetadataFactoryInterface;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\TestCase;

class ArrayCollectionHandlerTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    #[DoesNotPerformAssertions]
    public function testSerializeArray()
    {
        $handler = new ArrayCollectionHandler();

        $visitor = $this->getMockBuilder(SerializationVisitorInterface::class)->getMock();
        $visitor->method('visitArray')->with(['foo'])->willReturn(['foo']);

        $context = $this->getMockBuilder(SerializationContext::class)->getMock();
        $type = ['name' => 'ArrayCollection', 'params' => []];

        $collection = new ArrayCollection(['foo']);

        $handler->serializeCollection($visitor, $collection, $type, $context);
    }

    /**
     * @doesNotPerformAssertions
     */
    #[DoesNotPerformAssertions]
    public function testSerializeArraySkipByExclusionStrategy()
    {
        $handler = new ArrayCollectionHandler(false);

        $visitor = $this->getMockBuilder(SerializationVisitorInterface::class)->getMock();
        $visitor->method('visitArray')->with([])->willReturn([]);

        $context = $this->getMockBuilder(SerializationContext::class)->getMock();

        $factoryMock = $this->getMockBuilder(MetadataFactoryInterface::class)->getMock();
        $factoryMock->method('getMetadataForClass')->willReturn(new ClassMetadata(ArrayCollection::class));

        $context->method('getExclusionStrategy')->willReturn(new AlwaysExcludeExclusionStrategy());
        $context->method('getMetadataFactory')->willReturn($factoryMock);

        $type = ['name' => 'ArrayCollection', 'params' => []];

        $collection = new ArrayCollection(['foo']);

        $handler->serializeCollection($visitor, $collection, $type, $context);
    }
}
