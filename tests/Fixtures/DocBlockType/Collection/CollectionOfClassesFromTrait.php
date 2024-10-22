<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

use Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection\Details\WithProductDescriptionTrait;

class CollectionOfClassesFromTrait
{
    use WithProductDescriptionTrait;
    use WithProductNameTrait;
}
