<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ObjectWithArrayIterator
{
    /**
     * @Serializer\Type("ArrayIterator<string,string>")
     * @Serializer\XmlKeyValuePairs
     *
     * @var \ArrayIterator
     */
    #[Serializer\Type(name: 'ArrayIterator<string,string>')]
    #[Serializer\XmlKeyValuePairs]
    public $iterator;

    public function __construct(\ArrayIterator $iterator)
    {
        $this->iterator = $iterator;
    }
}
