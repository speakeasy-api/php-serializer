<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ParentSkipWithEmptyChild
{
    private $c = 'c';

    private $d = 'd';

    /**
     * @Serializer\SkipWhenEmpty()
     *
     * @var InlineChild
     */
    #[Serializer\SkipWhenEmpty]
    private $child;

    public function __construct($child = null)
    {
        $this->child = $child ?: new InlineChild();
    }
}
