<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\ProductColor;

class CollectionOfInterfacesFromDifferentNamespace
{
    /**
     * @var ProductColor[]
     */
    public array $productColors;
}
