<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class InlineChild
{
    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    public $a = 'a';

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    public $b = 'b';
}
