<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;

class DiscriminatedComment
{
    /**
     * @Type("Speakeasy\Serializer\Tests\Fixtures\Author")
     */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\Author')]
    private $author;

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $text;

    /**
     * @Type("string")
     * @SerializedName("objectType")
     */
    #[Type(name: 'string')]
    #[SerializedName(name: 'objectType')]
    private $objectType = 'comment';

    public function __construct(?Author $author, $text)
    {
        $this->author = $author;
        $this->text = $text;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getObjectType()
    {
        return $this->objectType;
    }
}
