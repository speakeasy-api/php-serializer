<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ObjectWithIntListAndIntMap
{
    /**
     * @Serializer\Type("array<integer>")
     * @Serializer\Type("array<integer>")
 @Serializer\XmlList */
    #[Serializer\Type(name: 'array<integer>')]
    #[Serializer\XmlList]
    private $list;

    /**
     * @Serializer\Type("array<integer,integer>")
     * @Serializer\Type("array<integer,integer>")
 @Serializer\XmlMap */
    #[Serializer\Type(name: 'array<integer,integer>')]
    #[Serializer\XmlMap]
    private $map;

    public function __construct(array $list, array $map)
    {
        $this->list = $list;
        $this->map = $map;
    }
}
