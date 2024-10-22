<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;
use Speakeasy\Serializer\Annotation\VirtualProperty;

/**
 * @Serializer\ExclusionPolicy("ALL")
 */
#[Serializer\ExclusionPolicy(policy: 'ALL')]
class ObjectWithVirtualPropertiesAndDuplicatePropNameExcludeAll
{
    protected $name;

    /**
     * @Serializer\SerializedName("mood")
     *
     * @VirtualProperty()
     */
    #[Serializer\SerializedName(name: 'mood')]
    #[VirtualProperty]
    public function getName()
    {
        return 'value';
    }
}
