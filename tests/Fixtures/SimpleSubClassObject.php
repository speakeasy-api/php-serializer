<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlElement;
use Speakeasy\Serializer\Annotation\XmlNamespace;

/**
 * @XmlNamespace(prefix="old_foo", uri="http://foo.example.org");
 * @XmlNamespace(prefix="foo", uri="http://better.foo.example.org");
 */
#[XmlNamespace(prefix: 'old_foo', uri: 'http://foo.example.org')]
#[XmlNamespace(prefix: 'foo', uri: 'http://better.foo.example.org')]
class SimpleSubClassObject extends SimpleClassObject
{
    /**
     * @Type("string")
     * @XmlElement(namespace="http://better.foo.example.org")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://better.foo.example.org')]
    public $moo;

    /**
     * @Type("string")
     * @XmlElement(namespace="http://foo.example.org")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://foo.example.org')]
    public $baz;

    /**
     * @Type("string")
     * @XmlElement(namespace="http://new.foo.example.org")
     */
    #[Type(name: 'string')]
    #[XmlElement(namespace: 'http://new.foo.example.org')]
    public $qux;
}
