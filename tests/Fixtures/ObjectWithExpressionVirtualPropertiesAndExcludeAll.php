<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\ExclusionPolicy;
use Speakeasy\Serializer\Annotation\VirtualProperty;

/**
 * @VirtualProperty(
 *     "virtualValue",
 *     exp="object.getVirtualValue()"
 * )
 * @ExclusionPolicy("all")
 */
#[VirtualProperty(name: 'virtualValue', exp: 'object.getVirtualValue()')]
#[ExclusionPolicy(policy: 'all')]
class ObjectWithExpressionVirtualPropertiesAndExcludeAll
{
    public function getVirtualValue()
    {
        return 'value';
    }
}
