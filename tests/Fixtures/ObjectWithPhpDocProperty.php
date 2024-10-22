<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

// phpcs:disable
final class ObjectWithPhpDocProperty
{
    /**
     */
    private $emptyBlock;

    /**
     * @var string|null
     */
    private $firstname;

    /**
     * @var null|string
     */
    private $lastname;

}
