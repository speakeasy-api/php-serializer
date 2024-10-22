<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

class MapTypedAsGenericClass
{
    /**
     * @var array<int, Product>
     */
    public array $productIds;
}
