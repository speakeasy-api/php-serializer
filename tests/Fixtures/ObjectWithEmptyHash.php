<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ObjectWithEmptyHash
{
    /**
     * @Serializer\Type("array<string,string>")
     * @Serializer\XmlList(skipWhenEmpty=false)
     */
    #[Serializer\Type(name: 'array<string,string>')]
    #[Serializer\XmlList(skipWhenEmpty: false)]
    private $hash = [];
}
