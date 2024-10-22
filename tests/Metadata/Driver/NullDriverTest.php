<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Metadata\Driver;

use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\Metadata\Driver\NullDriver;
use Speakeasy\Serializer\Naming\IdenticalPropertyNamingStrategy;
use PHPUnit\Framework\TestCase;

class NullDriverTest extends TestCase
{
    public function testReturnsValidMetadata()
    {
        $driver = new NullDriver(new IdenticalPropertyNamingStrategy());

        $metadata = $driver->loadMetadataForClass(new \ReflectionClass('stdClass'));

        self::assertInstanceOf(ClassMetadata::class, $metadata);
        self::assertCount(0, $metadata->propertyMetadata);
    }
}
