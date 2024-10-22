<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlNamespace;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("ObjectWithNamespacesAndNestedList", namespace="http://example.com/namespace")
 * @XmlNamespace(uri="http://example.com/namespace")
 * @XmlNamespace(uri="http://example.com/namespace2", prefix="x")
 */
#[XmlRoot(name: 'ObjectWithNamespacesAndNestedList', namespace: 'http://example.com/namespace')]
#[XmlNamespace(uri: 'http://example.com/namespace')]
#[XmlNamespace(uri: 'http://example.com/namespace2', prefix: 'x')]
class ObjectWithNamespacesAndNestedList
{
    /**
     * @Type("Speakeasy\Serializer\Tests\Fixtures\PersonCollection")
     * @SerializedName("person_collection")
     */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\PersonCollection')]
    #[SerializedName(name: 'person_collection')]
    public $personCollection;
}
