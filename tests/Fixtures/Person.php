<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlAttribute;
use Speakeasy\Serializer\Annotation\XmlRoot;
use Speakeasy\Serializer\Annotation\XmlValue;

/**
 * @XmlRoot("child")
 */
#[XmlRoot(name: 'child')]
class Person
{
    public const ALTERNATE_SERIALIZED_NAME = 'personName';

    /**
     * @Type("string")
     * @XmlValue(cdata=false)
     */
    #[Type(name: 'string')]
    #[XmlValue(cdata: false)]
    public $name;

    /**
     * @Type("int")
     * @XmlAttribute
     */
    #[Type(name: 'int')]
    #[XmlAttribute]
    public $age;
}
