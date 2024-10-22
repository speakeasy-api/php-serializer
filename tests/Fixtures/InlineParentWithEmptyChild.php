<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;
use Speakeasy\Serializer\Annotation\Type;

/** @Serializer\AccessorOrder("alphabetical") */
#[Serializer\AccessorOrder(order: 'alphabetical')]
class InlineParentWithEmptyChild
{
    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $c = 'c';

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $d = 'd';

    /**
     * @Serializer\Inline
     *
     * @Type("Speakeasy\Serializer\Tests\Fixtures\InlineChildEmpty")
     */
    #[Serializer\Inline]
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\InlineChildEmpty')]
    private $child;

    public function __construct($child = null)
    {
        $this->child = $child ?: new InlineChildEmpty();
    }
}
