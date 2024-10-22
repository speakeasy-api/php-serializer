<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\TypedProperties;

use Speakeasy\Serializer\Annotation\UnionDiscriminator;
use Speakeasy\Serializer\Tests\Fixtures\DiscriminatedAuthor;
use Speakeasy\Serializer\Tests\Fixtures\DiscriminatedComment;

class ComplexDiscriminatedUnion
{
    /**
     * @UnionDiscriminator(
     *     field = "objectType",
     *     map = {"author": "Speakeasy\Serializer\Tests\Fixtures\DiscriminatedAuthor", "comment": "Speakeasy\Serializer\Tests\Fixtures\DiscriminatedComment"}
     * )"
     */
    #[UnionDiscriminator(field: 'objectType', map: ['author' => 'Speakeasy\Serializer\Tests\Fixtures\DiscriminatedAuthor', 'comment' => 'Speakeasy\Serializer\Tests\Fixtures\DiscriminatedComment'])]
    private DiscriminatedAuthor|DiscriminatedComment $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData(): DiscriminatedAuthor|DiscriminatedComment
    {
        return $this->data;
    }
}
