<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\ProductDescription;

class SingleClassFromDifferentNamespaceTypeHint
{
    /**
     * @var ProductDescription
     */
    public $data;
}
