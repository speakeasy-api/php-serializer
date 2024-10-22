<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\VirtualProperty("firstName", exp="object.getFirstName()", options={@Serializer\SerializedName("my_first_name")})
 */
#[Serializer\VirtualProperty(name: 'firstName', exp: 'object.getFirstName()', options: [[Serializer\SerializedName::class, ['my_first_name']]])]
class AuthorExpressionAccess
{
    private $id;

    /**
     * @Serializer\Exclude()
     */
    #[Serializer\Exclude]
    private $firstName;

    /**
     * @Serializer\Exclude()
     */
    #[Serializer\Exclude]
    private $lastName;

    public function __construct($id, $firstName, $lastName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @Serializer\VirtualProperty()
     */
    #[Serializer\VirtualProperty]
    public function getLastName()
    {
        return $this->lastName;
    }
}
