<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType;

class UnionTypedDocBlockProperty
{
    /**
     * @var int|bool|float|string
     */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}
