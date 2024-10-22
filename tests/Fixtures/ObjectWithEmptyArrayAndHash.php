<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ObjectWithEmptyArrayAndHash
{
    /**
     * @Serializer\Type("array<string,string>")
     * @Serializer\SkipWhenEmpty()
     */
    #[Serializer\Type(name: 'array<string,string>')]
    #[Serializer\SkipWhenEmpty]
    private $hash = [];

    /**
     * @Serializer\Type("array<string>")
     * @Serializer\SkipWhenEmpty()
     */
    #[Serializer\Type(name: 'array<string>')]
    #[Serializer\SkipWhenEmpty]
    private $array = [];

    /**
     * @Serializer\SkipWhenEmpty()
     */
    #[Serializer\SkipWhenEmpty]
    private $object = [];

    public function __construct()
    {
        $this->object = new InlineChildEmpty();
    }
}
