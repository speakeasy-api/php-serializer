<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\TypedProperties;

class UnionTypedProperties
{
    private int|bool|float|string $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}
