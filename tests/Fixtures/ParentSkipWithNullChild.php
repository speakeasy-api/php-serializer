<?php

declare(strict_types=1);

namespace JMS\Serializer\Tests\Fixtures;

use JMS\Serializer\Annotation as Serializer;

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
