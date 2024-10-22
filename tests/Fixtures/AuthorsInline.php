<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class AuthorsInline
{
    /**
     * @Serializer\Type("array<Speakeasy\Serializer\Tests\Fixtures\Author>")
     * @Serializer\Inline()
     */
    #[Serializer\Type(name: 'array<Speakeasy\Serializer\Tests\Fixtures\Author>')]
    #[Serializer\Inline]
    private $collection;

    public function __construct(Author ...$authors)
    {
        $this->collection = $authors;
    }
}
