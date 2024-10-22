<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;
use Speakeasy\Serializer\Annotation\Type;

class InlineChildWithGroups
{
    /**
     * @Serializer\Groups({"a"})
     *
     * @Type("string")
     */
    #[Serializer\Groups(groups: ['a'])]
    #[Type(name: 'string')]
    public $a = 'a';

    /**
     * @Serializer\Groups({"b"})
     *
     * @Type("string")
     */
    #[Serializer\Groups(groups: ['b'])]
    #[Type(name: 'string')]
    public $b = 'b';
}
