<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Serializer\Naming;

use Speakeasy\Serializer\Naming\IdenticalPropertyNamingStrategy;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class IdenticalPropertyNamingStrategyTest extends TestCase
{
    public static function providePropertyNames()
    {
        return [
            ['createdAt'],
            ['my_field'],
            ['identical'],
        ];
    }

    /**
     * @dataProvider providePropertyNames
     */
    #[DataProvider('providePropertyNames')]
    public function testTranslateName($propertyName)
    {
        $mockProperty = $this->getMockBuilder('Speakeasy\Serializer\Metadata\PropertyMetadata')->disableOriginalConstructor()->getMock();
        $mockProperty->name = $propertyName;

        $strategy = new IdenticalPropertyNamingStrategy();
        self::assertEquals($propertyName, $strategy->translateName($mockProperty));
    }
}
