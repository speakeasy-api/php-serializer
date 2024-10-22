<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Benchmark\Performance;

use Speakeasy\Serializer\Tests\Benchmark\AbstractSerializationBench;

class JsonSerializationBench extends AbstractSerializationBench
{
    protected function getFormat(): string
    {
        return 'json';
    }
}
