<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ObjectUsingTypeCasting
{
    /**
     * @Serializer\Type("string")
     *
     * @var ObjectWithToString
     */
    #[Serializer\Type(name: 'string')]
    public $asString;
}
