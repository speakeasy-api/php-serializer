<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Serializer\Naming;

use Speakeasy\Serializer\Naming\CamelCaseNamingStrategy;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CamelCaseNamingStrategyTest extends TestCase
{
    public static function providePropertyNames()
    {
        return [
            ['getUrl', 'get_url'],
            ['getURL', 'get_url'],
        ];
    }

    /**
     * @dataProvider providePropertyNames
     */
    #[DataProvider('providePropertyNames')]
    public function testCamelCaseNamingHandlesMultipleUppercaseLetters($propertyName, $expected)
    {
        $mockProperty = $this->getMockBuilder('Speakeasy\Serializer\Metadata\PropertyMetadata')->disableOriginalConstructor()->getMock();
        $mockProperty->name = $propertyName;

        $strategy = new CamelCaseNamingStrategy();
        self::assertEquals($expected, $strategy->translateName($mockProperty));
    }
}
