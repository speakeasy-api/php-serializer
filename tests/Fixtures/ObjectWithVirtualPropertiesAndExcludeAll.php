<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\ExclusionPolicy;
use Speakeasy\Serializer\Annotation\VirtualProperty;

/**
 * @ExclusionPolicy("all")
 */
#[ExclusionPolicy(policy: 'all')]
class ObjectWithVirtualPropertiesAndExcludeAll
{
    /**
     * @VirtualProperty
     */
    #[VirtualProperty]
    public function getVirtualValue()
    {
        return 'value';
    }
}
