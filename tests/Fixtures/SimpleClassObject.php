<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlAttribute;
use Speakeasy\Serializer\Annotation\XmlElement;
use Speakeasy\Serializer\Annotation\XmlNamespace;

/**
 * @XmlNamespace(prefix="old_foo", uri="http://old.foo.example.org");
 * @XmlNamespace(prefix="foo", uri="http://foo.example.org");
 * @XmlNamespace(prefix="new_foo", uri="http://new.foo.example.org");
 */
#[XmlNamespace(prefix: 'old_foo', uri: 'http://old.foo.example.org')]
#[XmlNamespace(prefix: 'foo', uri: 'http://foo.example.org')]
#[XmlNamespace(prefix: 'new_foo', uri: 'http://new.foo.example.org')]
class SimpleClassObject
{
    /**
     * @Type("string")
     * @XmlAttribute(namespace="http://old.foo.example.org")
     */
    #[Type(name: 'string')]
    #[XmlAttribute(namespace: 'http://old.foo.example.org')]
    public $foo;

    /**
     * @Type("string")
     * @XmlElement(namespace="http://foo.example.org")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://foo.example.org')]
    public $bar;

    /**
     * @Type("string")
     * @XmlElement(namespace="http://new.foo.example.org")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://new.foo.example.org')]
    public $moo;
}
