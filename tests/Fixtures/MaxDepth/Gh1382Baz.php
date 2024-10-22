<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\MaxDepth;

use Speakeasy\Serializer\Annotation as Serializer;

class Gh1382Baz
{
    /**
     * @Serializer\MaxDepth(1)
     */
    #[Serializer\MaxDepth(depth: 1)]
    public $a;

    public function __construct()
    {
        $this->a = new Gh1382Bar();
        $this->a->c = new Gh1382Bar();
    }
}
