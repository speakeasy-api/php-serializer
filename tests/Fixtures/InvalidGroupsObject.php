<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Groups;
use Speakeasy\Serializer\Annotation\Type;

class InvalidGroupsObject
{
    /**
     * @Groups({"foo, bar"})
     * @Type("string")
     */
    #[Groups(groups: ['foo, bar'])]
    #[Type(name: 'string')]
    private $foo;
}
