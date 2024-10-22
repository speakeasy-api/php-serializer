<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ParentSkipWithNullChild
{
    private $c = 'c';

    private $d = 'd';

    /**
     * @Serializer\SkipWhenNull()
     *
     * @var InlineChild
     */
    #[Serializer\SkipWhenNull]
    private $child;

    public function __construct($child = null)
    {
        $this->child = $child;
    }
}
