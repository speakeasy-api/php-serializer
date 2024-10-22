<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/** @Serializer\AccessorOrder("alphabetical") */
#[Serializer\AccessorOrder(order: 'alphabetical')]
class AccessorOrderParent
{
    private $b = 'b', $a = 'a';
}
