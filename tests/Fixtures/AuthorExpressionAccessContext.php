<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\VirtualProperty("firstName", exp="object.getFirstName()")
 * @Serializer\VirtualProperty("direction", exp="context.getDirection()")
 * @Serializer\VirtualProperty("name", exp="property_metadata.name")
 */
#[Serializer\VirtualProperty(name: 'firstName', exp: 'object.getFirstName()')]
#[Serializer\VirtualProperty(name: 'direction', exp: 'context.getDirection()')]
#[Serializer\VirtualProperty(name: 'name', exp: 'property_metadata.name')]
class AuthorExpressionAccessContext
{
    /**
     * @Serializer\Exclude()
     */
    #[Serializer\Exclude]
    private $firstName;

    public function __construct($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
}
