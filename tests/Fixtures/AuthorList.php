<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * An array-acting object that holds many author instances.
 */
class AuthorList implements \IteratorAggregate, \Countable, \ArrayAccess
{
    /**
     * @Serializer\Type("array<Speakeasy\Serializer\Tests\Fixtures\Author>")
     *
     * @var array
     */
    #[Serializer\Type(name: 'array<Speakeasy\Serializer\Tests\Fixtures\Author>')]
    protected $authors = [];

    public function add(Author $author)
    {
        $this->authors[] = $author;
    }

    /**
     * @see IteratorAggregate
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->authors);
    }

    /**
     * @see Countable
     */
    public function count(): int
    {
        return count($this->authors);
    }

    /**
     * @see ArrayAccess
     */
    public function offsetExists($offset): bool
    {
        return isset($this->authors[$offset]);
    }

    /**
     * @see ArrayAccess
     */
    public function offsetGet($offset): ?Author
    {
        return $this->authors[$offset] ?? null;
    }

    /**
     * @see ArrayAccess
     */
    public function offsetSet($offset, $value): void
    {
        if (null === $offset) {
            $this->authors[] = $value;
        } else {
            $this->authors[$offset] = $value;
        }
    }

    /**
     * @see ArrayAccess
     */
    public function offsetUnset($offset): void
    {
        unset($this->authors[$offset]);
    }
}
