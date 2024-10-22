<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Accessor;
use Speakeasy\Serializer\Annotation\XmlAttribute;
use Speakeasy\Serializer\Annotation\XmlList;
use Speakeasy\Serializer\Annotation\XmlMap;
use Speakeasy\Serializer\Annotation\XmlRoot;

/** @XmlRoot("post") */
#[XmlRoot(name: 'post')]
class IndexedCommentsBlogPost
{
    /**
     * @XmlMap(keyAttribute="author-name", inline=true, entry="comments")
     * @Accessor(getter="getCommentsIndexedByAuthor")
     */
    #[XmlMap(keyAttribute: 'author-name', entry: 'comments', inline: true)]
    #[Accessor(getter: 'getCommentsIndexedByAuthor')]
    private $comments = [];

    public function __construct()
    {
        $author = new Author('Foo');
        $this->comments[] = new Comment($author, 'foo');
        $this->comments[] = new Comment($author, 'bar');
    }

    public function getCommentsIndexedByAuthor()
    {
        $indexedComments = [];
        foreach ($this->comments as $comment) {
            $authorName = $comment->getAuthor()->getName();

            if (!isset($indexedComments[$authorName])) {
                $indexedComments[$authorName] = new IndexedCommentsList();
            }

            $indexedComments[$authorName]->addComment($comment);
        }

        return $indexedComments;
    }
}

class IndexedCommentsList
{
    /** @XmlList(inline=true, entry="comment") */
    #[XmlList(entry: 'comment', inline: true)]
    private $comments = [];

    /** @XmlAttribute */
    #[XmlAttribute]
    private $count = 0;

    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
        $this->count += 1;
    }
}
