<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class CircularReferenceCollection
{
    /** @Type("string") */
    #[Type(name: 'string')]
    public $name = 'foo';

    /** @Type("array<Speakeasy\Serializer\Tests\Fixtures\CircularReferenceCollection>") */
    #[Type(name: 'array<Speakeasy\Serializer\Tests\Fixtures\CircularReferenceCollection>')]
    public $collection = [];
}
