<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

class CollectionTypedAsGenericClass
{
    /**
     * @var array<Product>
     */
    public array $productIds;
}
