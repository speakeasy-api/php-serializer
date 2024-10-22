<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\{ProductDescription as Description, ProductName};

class CollectionOfClassesFromDifferentNamespaceUsingGroupAlias
{
    /**
     * @var Description[]
     */
    public array $productDescriptions;
    /**
     * @var ProductName[]
     */
    public array $productNames;
}
