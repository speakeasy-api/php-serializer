<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\ProductDescription as Description;

class CollectionOfClassesFromDifferentNamespaceUsingSingleAlias
{
    /**
     * @var Description[]
     */
    public array $productDescriptions;
}
