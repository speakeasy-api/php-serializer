<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class ObjectWithObjectProperty
{
    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $foo;

    /**
     * @Type("Speakeasy\Serializer\Tests\Fixtures\Author")
     */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\Author')]
    private $author;

    /**
     * @return string
     */
    public function getFoo()
    {
        return $this->foo;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
