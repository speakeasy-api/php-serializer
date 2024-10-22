<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/** @Serializer\AccessorOrder("custom",  custom = {"method", "b", "a"}) */
#[Serializer\AccessorOrder(order: 'custom', custom: ['method', 'b', 'a'])]
class AccessorOrderMethod
{
    private $b = 'b', $a = 'a';

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("foo")
     *
     * @return string
     */
    #[Serializer\VirtualProperty]
    #[Serializer\SerializedName(name: 'foo')]
    public function getMethod()
    {
        return 'c';
    }
}
