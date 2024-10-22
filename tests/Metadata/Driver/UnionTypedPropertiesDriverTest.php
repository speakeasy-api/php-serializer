<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Metadata\Driver;

use Doctrine\Common\Annotations\AnnotationReader;
use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\Metadata\Driver\AnnotationDriver;
use Speakeasy\Serializer\Metadata\Driver\NullDriver;
use Speakeasy\Serializer\Metadata\Driver\TypedPropertiesDriver;
use Speakeasy\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Speakeasy\Serializer\Tests\Fixtures\TypedProperties\UnionTypedProperties;
use Metadata\Driver\DriverChain;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class UnionTypedPropertiesDriverTest extends TestCase
{
    protected function setUp(): void
    {
        if (PHP_VERSION_ID < 80000) {
            $this->markTestSkipped(sprintf('%s requires PHP 8.0', TypedPropertiesDriver::class));
        }
    }

    public function testInferUnionTypesShouldResultInManyTypes()
    {
        $m = $this->resolve(UnionTypedProperties::class);

        self::assertEquals(
            [
                'name' => 'union',
                'params' =>
                    [
                        [
                            [
                                'name' => 'string',
                                'params' => [],
                            ],
                            [
                                'name' => 'int',
                                'params' => [],
                            ],
                            [
                                'name' => 'float',
                                'params' => [],
                            ],
                            [
                                'name' => 'bool',
                                'params' => [],
                            ],
                        ],
                    ],
            ],
            $m->propertyMetadata['data']->type,
        );
    }

    private function resolve(string $classToResolve): ClassMetadata
    {
        $namingStrategy = new IdenticalPropertyNamingStrategy();

        $driver = new DriverChain([
            new AnnotationDriver(new AnnotationReader(), $namingStrategy),
            new NullDriver($namingStrategy),
        ]);

        $driver = new TypedPropertiesDriver($driver);

        $m = $driver->loadMetadataForClass(new ReflectionClass($classToResolve));
        self::assertNotNull($m);

        return $m;
    }
}
