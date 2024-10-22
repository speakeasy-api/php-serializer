<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\Exclude(if="object.expired")
 */
#[Serializer\Exclude(if: 'object.expired')]
class PersonAccountParentWithExclude
{
    /**
     * @Serializer\Type("boolean")
     */
    #[Serializer\Type(name: 'boolean')]
    public $expired;
}
