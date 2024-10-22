<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Benchmark\Performance;

use Speakeasy\Serializer\SerializationContext;

class JsonMaxDepthSerializationBench extends JsonSerializationBench
{
    protected function createContext(): SerializationContext
    {
        return parent::createContext()->enableMaxDepthChecks();
    }
}
