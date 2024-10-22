<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\ExclusionStrategy;

use Speakeasy\Serializer\Context;
use Speakeasy\Serializer\Exclusion\ExclusionStrategyInterface;
use Speakeasy\Serializer\Metadata\ClassMetadata;
use Speakeasy\Serializer\Metadata\PropertyMetadata;

class AlwaysExcludeExclusionStrategy implements ExclusionStrategyInterface
{
    public function shouldSkipClass(ClassMetadata $metadata, Context $context): bool
    {
        return true;
    }

    public function shouldSkipProperty(PropertyMetadata $property, Context $context): bool
    {
        return false;
    }
}
