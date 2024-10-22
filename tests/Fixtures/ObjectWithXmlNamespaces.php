<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlAttribute;
use Speakeasy\Serializer\Annotation\XmlElement;
use Speakeasy\Serializer\Annotation\XmlNamespace;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("test-object", namespace="http://example.com/namespace", prefix="ex")
 * @XmlNamespace(uri="http://example.com/namespace")
 * @XmlNamespace(uri="http://schemas.google.com/g/2005", prefix="gd")
 * @XmlNamespace(uri="http://www.w3.org/2005/Atom", prefix="atom")
 */
#[XmlRoot(name: 'test-object', namespace: 'http://example.com/namespace', prefix: 'ex')]
#[XmlNamespace(uri: 'http://example.com/namespace')]
#[XmlNamespace(uri: 'http://schemas.google.com/g/2005', prefix: 'gd')]
#[XmlNamespace(uri: 'http://www.w3.org/2005/Atom', prefix: 'atom')]
class ObjectWithXmlNamespaces
{
    /**
     * @Type("string")
     * @XmlElement(namespace="http://purl.org/dc/elements/1.1/");
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://purl.org/dc/elements/1.1/')]
    private $title;

    /**
     * @Type("DateTime")
     * @XmlAttribute
     */
    #[Type(name: 'DateTime')]
    #[XmlAttribute]
    private $createdAt;

    /**
     * @Type("string")
     * @XmlAttribute(namespace="http://schemas.google.com/g/2005")
     */
    #[Type(name: 'string')]
    #[XmlAttribute(namespace: 'http://schemas.google.com/g/2005')]
    private $etag;

    /**
     * @Type("string")
     * @XmlElement(namespace="http://www.w3.org/2005/Atom")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://www.w3.org/2005/Atom')]
    private $author;

    /**
     * @Type("string")
     * @XmlAttribute(namespace="http://purl.org/dc/elements/1.1/");
     */
    #[Type(name: 'string')]
    #[XmlAttribute(namespace: 'http://purl.org/dc/elements/1.1/')]
    private $language;

    /**
     * @Type("string")
     * @XmlElement(namespace="")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: '')]
    private $emptyNsElement;

    public function __construct($title, $author, \DateTime $createdAt, $language, $emptyNsElement)
    {
        $this->title = $title;
        $this->author = $author;
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->emptyNsElement = $emptyNsElement;
        $this->etag = sha1($this->createdAt->format(\DateTime::ATOM));
    }
}
