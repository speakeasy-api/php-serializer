<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class Tree
{
    /**
     * @Serializer\MaxDepth(10)
     */
    #[Serializer\MaxDepth(depth: 10)]
    public $tree;

    public function __construct($tree)
    {
        $this->tree = $tree;
    }
}
