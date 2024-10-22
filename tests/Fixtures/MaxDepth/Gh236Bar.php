<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\MaxDepth;

use Speakeasy\Serializer\Annotation as Serializer;

class Gh236Bar
{
    /**
     * @Serializer\Expose()
     */
    #[Serializer\Expose]
    public $xxx = 'yyy';

    /**
     * @Serializer\Expose()
     * @Serializer\SkipWhenEmpty()
     */
    #[Serializer\Expose]
    #[Serializer\SkipWhenEmpty]
    public $inner;
}
