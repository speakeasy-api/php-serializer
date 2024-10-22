<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/** @Serializer\AccessorOrder("custom", custom = {"c", "d", "a", "b"}) */
#[Serializer\AccessorOrder(order: 'custom', custom: ['c', 'd', 'a', 'b'])]
class AccessorOrderChild extends AccessorOrderParent
{
    private $c = 'c', $d = 'd';
}
