<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\XmlKeyValuePairs;

class ObjectWithXmlKeyValuePairs
{
    /**
     * @var array
     * @XmlKeyValuePairs
     */
    #[XmlKeyValuePairs]
    private $array = [
        'key-one' => 'foo',
        'key-two' => 1,
        'nested-array' => ['bar' => 'foo'],
        'without-keys' => [
            1,
            'test',
        ],
        'mixed' => [
            'test',
            'foo' => 'bar',
            '1_foo' => 'bar',
        ],
        1 => 'foo',
    ];
}
