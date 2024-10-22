<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlKeyValuePairs;

class ObjectWithXmlKeyValuePairsWithObjectType
{
    /**
     * @var array
     * @Type("array<string,Speakeasy\Serializer\Tests\Fixtures\ObjectWithXmlKeyValuePairsWithType>")
     * @XmlKeyValuePairs
     */
    #[Type(name: 'array<string,Speakeasy\Serializer\Tests\Fixtures\ObjectWithXmlKeyValuePairsWithType>')]
    #[XmlKeyValuePairs]
    private $list;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public static function create1()
    {
        return new self(
            [
                'key_first' => ObjectWithXmlKeyValuePairsWithType::create1(),
                'key_second' => ObjectWithXmlKeyValuePairsWithType::create2(),
            ],
        );
    }
}
