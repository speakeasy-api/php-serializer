<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Construction\ObjectConstructorInterface;
use Speakeasy\Serializer\Construction\UnserializeObjectConstructor;
use Speakeasy\Serializer\DeserializationContext;
use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\Visitor\DeserializationVisitorInterface;

class InitializedBlogPostConstructor implements ObjectConstructorInterface
{
    private $fallback;

    public function __construct()
    {
        $this->fallback = new UnserializeObjectConstructor();
    }

    public function construct(DeserializationVisitorInterface $visitor, ClassMetadata $metadata, $data, array $type, DeserializationContext $context): ?object
    {
        if ('Speakeasy\Serializer\Tests\Fixtures\BlogPost' !== $type['name']) {
            return $this->fallback->construct($visitor, $metadata, $data, $type, $context);
        }

        return new BlogPost('This is a nice title.', new Author('Foo Bar'), new \DateTime('2011-07-30 00:00', new \DateTimeZone('UTC')), new Publisher('Bar Foo'));
    }
}
