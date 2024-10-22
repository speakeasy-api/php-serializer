<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

class CollectionOfClassesWithFullNamespacePath
{
    /**
     * @var Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Product[]
     */
    public array $productIds;
}
