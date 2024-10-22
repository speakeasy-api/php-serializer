<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Metadata\Driver;

use Doctrine\Common\Annotations\AnnotationReader;
use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\Metadata\Driver\AnnotationDriver;
use Speakeasy\Serializer\Metadata\Driver\TypedPropertiesDriver;
use Speakeasy\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Speakeasy\Serializer\Tests\Fixtures\TypedProperties\User;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class TypedPropertiesDriverTest extends TestCase
{
    public function testInferPropertiesFromTypes()
    {
        $m = $this->resolve(User::class);

        $expectedPropertyTypes = [
            'id' => 'int',
            'role' => 'Speakeasy\Serializer\Tests\Fixtures\TypedProperties\Role',
            'vehicle' => 'Speakeasy\Serializer\Tests\Fixtures\TypedProperties\Vehicle',
            'created' => 'DateTime',
            'tags' => 'iterable',
            'virtualRole' => 'Speakeasy\Serializer\Tests\Fixtures\TypedProperties\Role',
        ];

        foreach ($expectedPropertyTypes as $property => $type) {
            self::assertEquals(['name' => $type, 'params' => []], $m->propertyMetadata[$property]->type);
        }
    }

    private function resolve(string $classToResolve): ClassMetadata
    {
        $baseDriver = new AnnotationDriver(new AnnotationReader(), new IdenticalPropertyNamingStrategy());
        $driver = new TypedPropertiesDriver($baseDriver);

        $m = $driver->loadMetadataForClass(new ReflectionClass($classToResolve));
        self::assertNotNull($m);

        return $m;
    }
}
