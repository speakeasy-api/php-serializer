<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\ProductName;

trait WithProductNameTrait
{
    /**
     * @var ProductName[]
     */
    public array $productNames;
}
