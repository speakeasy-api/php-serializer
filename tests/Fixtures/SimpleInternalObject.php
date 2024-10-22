<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("ALL")
 */
#[Serializer\ExclusionPolicy(policy: 'ALL')]
class SimpleInternalObject extends \Exception
{
    private $bar;

    protected $camelCase = 'boo';

    public function __construct($foo, $bar)
    {
        parent::__construct($foo);

        $this->bar = $bar;
    }
}
