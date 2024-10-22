<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\ExclusionPolicy;
use Speakeasy\Serializer\Annotation\Expose;

/**
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * @ExclusionPolicy(policy="all")
 */
#[ExclusionPolicy(policy: 'all')]
class AllExcludedObject
{
    private $foo = 'foo';

    /**
     * @Expose
     */
    #[Expose]
    private $bar = 'bar';
}
