<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Collection;

final class ConstructorPropertyPromotionWithScalar
{
    /**
     * @param string $data
     */
    public function __construct(
        private $data,
    ) {
    }
}
