<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\ProductColor;

class CollectionOfInterfacesFromGlobalNamespace
{
    /**
     * phpcs:ignore SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly.ReferenceViaFullyQualifiedName
     *
     * @var ProductColor[]
     */
    public array $productColors;
}
