<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Benchmark\Performance;

use Speakeasy\Serializer\Tests\Benchmark\AbstractSerializationBench;

class XmlSerializationBench extends AbstractSerializationBench
{
    protected function getFormat(): string
    {
        return 'xml';
    }
}
