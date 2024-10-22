<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ObjectWithGenerator
{
    /**
     * @Serializer\Type("Generator<string,string>")
     * @Serializer\XmlKeyValuePairs
     *
     * @var \Generator
     */
    #[Serializer\Type(name: 'Generator<string,string>')]
    #[Serializer\XmlKeyValuePairs]
    public $generator;

    public function __construct(\Generator $generator)
    {
        $this->generator = $generator;
    }
}
