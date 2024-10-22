<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Metadata\Driver;

use Doctrine\Common\Annotations\AnnotationReader;
use Speakeasy\Serializer\Builder\DefaultDriverFactory;
use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Speakeasy\Serializer\Tests\Fixtures\TypedProperties\User;
use PHPUnit\Framework\TestCase;

class DefaultDriverFactoryTest extends TestCase
{
    public function testDefaultDriverFactoryLoadsTypedPropertiesDriver()
    {
        $factory = new DefaultDriverFactory(new IdenticalPropertyNamingStrategy());

        $driver = $factory->createDriver([], new AnnotationReader());

        $m = $driver->loadMetadataForClass(new \ReflectionClass(User::class));
        \assert($m instanceof ClassMetadata);
        self::assertNotNull($m);

        $expectedPropertyTypes = [
            'id' => 'int',
            'role' => 'Speakeasy\Serializer\Tests\Fixtures\TypedProperties\Role',
            'created' => 'DateTime',
            'tags' => 'iterable',
        ];

        foreach ($expectedPropertyTypes as $property => $type) {
            self::assertEquals(['name' => $type, 'params' => []], $m->propertyMetadata[$property]->type);
        }
    }
}
