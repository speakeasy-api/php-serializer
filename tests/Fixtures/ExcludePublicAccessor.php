<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\AccessType;
use Speakeasy\Serializer\Annotation\Exclude;
use Speakeasy\Serializer\Annotation\ReadOnlyProperty;

/**
 * @AccessType("public_method")
 * @ReadOnlyProperty
 */
#[AccessType(type: 'public_method')]
#[ReadOnlyProperty]
class ExcludePublicAccessor
{
    /**
     * @Exclude
     * @var mixed
     */
    #[Exclude]
    private $iShallNotBeAccessed;

    /**
     * @var int
     */
    private $id = 1;

    public function getId()
    {
        return $this->id;
    }
}
