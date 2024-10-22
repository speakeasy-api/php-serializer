<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\MaxDepth;

use Speakeasy\Serializer\Annotation as Serializer;

class Gh236Foo
{
    /**
     * @Serializer\MaxDepth(1)
     */
    #[Serializer\MaxDepth(depth: 1)]
    public $a;

    public function __construct()
    {
        $this->a = new Gh236Bar();
        $this->a->inner = new Gh236Bar();
    }
}
