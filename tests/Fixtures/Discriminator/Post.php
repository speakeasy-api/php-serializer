<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\Discriminator;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "type", map = {
 *    "post": "Speakeasy\Serializer\Tests\Fixtures\Discriminator\Post",
 *    "image_post": "Speakeasy\Serializer\Tests\Fixtures\Discriminator\ImagePost",
 * })
 */
#[Serializer\Discriminator(field: 'type', map: ['post' => 'Speakeasy\Serializer\Tests\Fixtures\Discriminator\Post', 'image_post' => 'Speakeasy\Serializer\Tests\Fixtures\Discriminator\ImagePost'])]
class Post
{
    /** @Serializer\Type("string") */
    #[Serializer\Type(name: 'string')]
    public $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }
}
