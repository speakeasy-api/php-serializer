<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlElement;
use Speakeasy\Serializer\Annotation\XmlNamespace;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("property:test-object", namespace="http://example.com/namespace-property")
 * @XmlNamespace(uri="http://example.com/namespace-property", prefix="property")
 */
#[XmlRoot(name: 'property:test-object', namespace: 'http://example.com/namespace-property')]
#[XmlNamespace(uri: 'http://example.com/namespace-property', prefix: 'property')]
class ObjectWithXmlNamespacesAndObjectProperty
{
    /**
     * @Type("string")
     * @XmlElement(namespace="http://example.com/namespace-property");
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://example.com/namespace-property')]
    private $title;

    /**
     * @Type("Speakeasy\Serializer\Tests\Fixtures\ObjectWithXmlNamespacesAndObjectPropertyAuthor")
     * @XmlElement(namespace="http://example.com/namespace-property")
     */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\ObjectWithXmlNamespacesAndObjectPropertyAuthor')]
    #[XmlElement(namespace: 'http://example.com/namespace-property')]
    private $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }
}
