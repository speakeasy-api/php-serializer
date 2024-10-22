<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\Discriminator\Serialization;

use Speakeasy\Serializer\Annotation as JMS;

/**
 * @JMS\Discriminator(field = "entityName",
 *     groups={"entity.identification"},
 *     map = {
 *     "User": "Speakeasy\Serializer\Tests\Fixtures\Discriminator\Serialization\User",
 *     "ExtendedUser": "Speakeasy\Serializer\Tests\Fixtures\Discriminator\Serialization\ExtendedUser"
 * })
 */
#[JMS\Discriminator(field: 'entityName', groups: ['entity.identification'], map: ['User' => 'Speakeasy\Serializer\Tests\Fixtures\Discriminator\Serialization\User', 'ExtendedUser' => 'Speakeasy\Serializer\Tests\Fixtures\Discriminator\Serialization\ExtendedUser'])]
class User extends Entity
{
    /**
     * @JMS\Type("string")
     * @JMS\Groups({"base"})
     * @var string
     */
    #[JMS\Type(name: 'string')]
    #[JMS\Groups(groups: ['base'])]
    public $name;

    /**
     * @JMS\Type("string")
     * @JMS\Groups({"base"})
     * @var string
     */
    #[JMS\Type(name: 'string')]
    #[JMS\Groups(groups: ['base'])]
    public $description;

    public function __construct(int $id, string $name, string $description)
    {
        parent::__construct($id);

        $this->name = $name;
        $this->description = $description;
    }
}
