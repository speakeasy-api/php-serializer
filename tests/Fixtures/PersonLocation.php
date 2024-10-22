<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("person_location")
 */
#[XmlRoot(name: 'person_location')]
class PersonLocation
{
    /**
     * @Type("Speakeasy\Serializer\Tests\Fixtures\Person")
     */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\Person')]
    public $person;

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    public $location;
}
