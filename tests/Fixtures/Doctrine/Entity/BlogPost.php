<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;
use Speakeasy\Serializer\Annotation as Serializer;
use Speakeasy\Serializer\Annotation\Groups;
use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlAttribute;
use Speakeasy\Serializer\Annotation\XmlList;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @ORM\Entity
 *
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"simple" = "BlogPost", "extended" = "ExtendedPost"})
 * @XmlRoot("blog-post")
 */
#[ORM\Entity]
#[InheritanceType('SINGLE_TABLE')]
#[XmlRoot(name: 'blog-post')]
#[DiscriminatorColumn(name: 'discr', type: 'string')]
#[DiscriminatorMap(['simple' => BlogPost::class, 'extended' => ExtendedPost::class])]
class BlogPost
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER)]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    protected $id;

    /**
     * @ORM\Column(type="guid")
     */
    #[ORM\Column(type: Types::GUID)]
    private $guid;

    /**
     * @ORM\Column(type="string")
     *
     * @Groups({"comments","post"})
     */
    #[ORM\Column(type: Types::STRING)]
    #[Groups(groups: ['comments', 'post'])]
    private $title;

    /**
     * @ORM\Column(type="some_custom_type")
     */
    #[ORM\Column(type: 'some_custom_type')]
    protected $slug;

    /**
     * @ORM\Column(type="datetime")
     *
     * @XmlAttribute
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[XmlAttribute]
    private $createdAt;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Type("integer")
     * This boolean to integer conversion is one of the few changes between this
     * and the standard BlogPost class. It's used to test the override behavior
     * of the DoctrineTypeDriver so notice it, but please don't change it.
     * @SerializedName("is_published")
     * @Groups({"post"})
     * @XmlAttribute
     */
    #[ORM\Column(type: Types::BOOLEAN)]
    #[Type(name: 'integer')]
    #[SerializedName(name: 'is_published')]
    #[Groups(groups: ['post'])]
    #[XmlAttribute]
    private $published;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="blogPost")
     *
     * @XmlList(inline=true, entry="comment")
     * @Groups({"comments"})
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'blogPost')]
    #[XmlList(entry: 'comment', inline: true)]
    #[Groups(groups: ['comments'])]
    private $comments;

    /**
     * @ORM\OneToOne(targetEntity="Author")
     *
     * @Groups({"post"})
     */
    #[ORM\OneToOne(targetEntity: Author::class)]
    #[Groups(groups: ['post'])]
    private $author;

    /**
     * @ORM\Column(type="integer")
     * @Serializer\Exclude()
     */
    #[ORM\Column(type: Types::INTEGER)]
    #[Serializer\Exclude]
    private $ref;

    public function __construct($title, Author $author, \DateTime $createdAt)
    {
        $this->title = $title;
        $this->author = $author;
        $this->published = false;
        $this->comments = new ArrayCollection();
        $this->createdAt = $createdAt;
    }

    public function setPublished()
    {
        $this->published = true;
    }

    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
    }

    /**
     * @Serializer\VirtualProperty()
     */
    #[Serializer\VirtualProperty]
    public function getRef()
    {
        return $this->ref;
    }
}
