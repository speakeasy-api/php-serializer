<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlElement;
use Speakeasy\Serializer\Annotation\XmlNamespace;

/**
 * @XmlNamespace(uri="http://example.com/namespace-author")
 */
#[XmlNamespace(uri: 'http://example.com/namespace-author')]
class ObjectWithXmlNamespacesAndObjectPropertyAuthor
{
    /**
     * @Type("string")
     * @XmlElement(namespace="http://example.com/namespace-modified");
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://example.com/namespace-modified')]
    private $author;

    /**
     * @Type("string")
     * @XmlElement(namespace="http://example.com/namespace-author");
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://example.com/namespace-author')]
    private $info = 'hidden-info';

    /**
     * @Type("string")
     * @XmlElement(namespace="http://example.com/namespace-property")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://example.com/namespace-property')]
    private $name;

    public function __construct($name, $author)
    {
        $this->name = $name;
        $this->author = $author;
    }
}
