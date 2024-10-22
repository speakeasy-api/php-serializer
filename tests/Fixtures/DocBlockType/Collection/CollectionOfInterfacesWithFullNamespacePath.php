<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

class CollectionOfInterfacesWithFullNamespacePath
{
    /**
     * @var Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\ProductColor[]
     */
    public array $productColors;
}
