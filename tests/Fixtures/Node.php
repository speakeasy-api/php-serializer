<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class Node
{
    /**
     * @Serializer\MaxDepth(2)
     */
    #[Serializer\MaxDepth(depth: 2)]
    public $children;

    public $foo = 'bar';

    public function __construct($children = [])
    {
        $this->children = $children;
    }
}
