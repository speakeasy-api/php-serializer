<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

class CollectionOfClassesWithNullSingleLinePhpDoc
{
    /** @var Product[]|null */
    public ?array $productIds;
}
