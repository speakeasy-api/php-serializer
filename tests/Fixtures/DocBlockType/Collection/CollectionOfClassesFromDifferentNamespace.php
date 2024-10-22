<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\ProductDescription;

class CollectionOfClassesFromDifferentNamespace
{
    /**
     * @var ProductDescription[]
     */
    public array $productDescriptions;
}
