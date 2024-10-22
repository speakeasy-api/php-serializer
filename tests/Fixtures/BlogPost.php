<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Doctrine\Common\Collections\ArrayCollection;
use Speakeasy\Serializer\Annotation\Groups;
use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlAttribute;
use Speakeasy\Serializer\Annotation\XmlElement;
use Speakeasy\Serializer\Annotation\XmlList;
use Speakeasy\Serializer\Annotation\XmlMap;
use Speakeasy\Serializer\Annotation\XmlNamespace;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("blog-post")
 * @XmlNamespace(uri="http://example.com/namespace")
 * @XmlNamespace(uri="http://schemas.google.com/g/2005", prefix="gd")
 * @XmlNamespace(uri="http://www.w3.org/2005/Atom", prefix="atom")
 * @XmlNamespace(uri="http://purl.org/dc/elements/1.1/", prefix="dc")
 */
#[XmlRoot(name: 'blog-post')]
#[XmlNamespace(uri: 'http://example.com/namespace')]
#[XmlNamespace(uri: 'http://schemas.google.com/g/2005', prefix: 'gd')]
#[XmlNamespace(uri: 'http://www.w3.org/2005/Atom', prefix: 'atom')]
#[XmlNamespace(uri: 'http://purl.org/dc/elements/1.1/', prefix: 'dc')]
class BlogPost
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     * @Groups(groups={"comments","post"})
     */
    #[Type('string')]
    #[XmlElement(cdata: false)]
    #[Groups(['comments', 'post'])]
    private $id = 'what_a_nice_id';

    /**
     * @Type("string")
     * @Groups({"comments","post"})
     * @XmlElement(namespace="http://purl.org/dc/elements/1.1/");
     */
    #[Type(name: 'string')]
    #[Groups(groups: ['comments', 'post'])]
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
     * @Type("boolean")
     * @SerializedName("is_published")
     * @XmlAttribute
     * @Groups({"post"})
     */
    #[Type(name: 'boolean')]
    #[SerializedName('is_published')]
    #[XmlAttribute]
    #[Groups(groups: ['post'])]
    private $published;

    /**
     * @Type("bool")
     * @SerializedName("is_reviewed")
     * @XmlAttribute
     * @Groups({"post"})
     */
    #[Type(name: 'bool')]
    #[SerializedName(name: 'is_reviewed')]
    #[XmlAttribute]
    #[Groups(groups: ['post'])]
    private $reviewed;

    /**
     * @Type("string")
     * @XmlAttribute(namespace="http://schemas.google.com/g/2005")
     * @Groups({"post"})
     */
    #[Type(name: 'string')]
    #[XmlAttribute(namespace: 'http://schemas.google.com/g/2005')]
    #[Groups(groups: ['post'])]
    private $etag;

    /**
     * @Type("ArrayCollection<Speakeasy\Serializer\Tests\Fixtures\Comment>")
     * @XmlList(inline=true, entry="comment")
     * @Groups({"comments"})
     */
    #[Type(name: 'ArrayCollection<Speakeasy\Serializer\Tests\Fixtures\Comment>')]
    #[XmlList(entry: 'comment', inline: true)]
    #[Groups(groups: ['comments'])]
    private $comments;

    /**
     * @Type("array<Speakeasy\Serializer\Tests\Fixtures\Comment>")
     * @XmlList(inline=true, entry="comment2")
     * @Groups({"comments"})
     */
    #[Type(name: 'array<Speakeasy\Serializer\Tests\Fixtures\Comment>')]
    #[XmlList(entry: 'comment2', inline: true)]
    #[Groups(groups: ['comments'])]
    private $comments2;

    /**
     * @Type("array<string,string>")
     * @XmlMap(keyAttribute = "key")
     */
    #[Type(name: 'array<string,string>')]
    #[XmlMap(keyAttribute: 'key')]
    private $metadata;

    /**
     * @Type("Speakeasy\Serializer\Tests\Fixtures\Author")
     * @Groups({"post"})
     * @XmlElement(namespace="http://www.w3.org/2005/Atom")
     */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\Author')]
    #[Groups(groups: ['post'])]
    #[XmlElement(namespace: 'http://www.w3.org/2005/Atom')]
    private $author;

    /**
     * @Type("Speakeasy\Serializer\Tests\Fixtures\Publisher")
     */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\Publisher')]
    private $publisher;

    /**
     * @Type("array<Speakeasy\Serializer\Tests\Fixtures\Tag>")
     * @XmlList(inline=true, entry="tag", namespace="http://purl.org/dc/elements/1.1/");
     */
    #[Type(name: 'array<Speakeasy\Serializer\Tests\Fixtures\Tag>')]
    #[XmlList(entry: 'tag', inline: true, namespace: 'http://purl.org/dc/elements/1.1/')]
    private $tag;

    public function __construct($title, Author $author, \DateTime $createdAt, Publisher $publisher)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->published = false;
        $this->reviewed = false;
        $this->comments = new ArrayCollection();
        $this->comments2 = [];
        $this->metadata = ['foo' => 'bar'];
        $this->createdAt = $createdAt;
        $this->etag = sha1($this->createdAt->format(\DateTime::ATOM));
    }

    public function setPublished()
    {
        $this->published = true;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
        $this->comments2[] = $comment;
    }

    public function addTag(Tag $tag)
    {
        $this->tag[] = $tag;
    }
}
