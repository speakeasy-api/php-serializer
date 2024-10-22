<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Benchmark\Memory;

use Speakeasy\Serializer\Tests\Benchmark\AbstractSerializationBench;

class JsonSingleRunBench extends AbstractSerializationBench
{
    public function __construct()
    {
        $this->amountOfComments = 1;
        $this->amountOfPosts = 1;

        parent::__construct();
    }

    protected function getFormat(): string
    {
        return 'json';
    }
}
