<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class CustomDeserializationObject
{
    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    public $someProperty;

    public function __construct($value)
    {
        $this->someProperty = $value;
    }
}
