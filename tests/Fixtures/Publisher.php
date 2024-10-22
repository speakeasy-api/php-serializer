<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlElement;
use Speakeasy\Serializer\Annotation\XmlNamespace;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("publisher")
 * @XmlNamespace(uri="http://example.com/namespace2", prefix="ns2")
 */
#[XmlRoot(name: 'publisher')]
#[XmlNamespace(uri: 'http://example.com/namespace2', prefix: 'ns2')]
class Publisher
{
    /**
     * @Type("string")
     * @XmlElement(namespace="http://example.com/namespace2")
     * @SerializedName("pub_name")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://example.com/namespace2')]
    #[SerializedName(name: 'pub_name')]
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
