<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;

class ParentNoMetadataChildObject extends ParentNoMetadata
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    #[Serializer\Type(name: 'string')]
    public $bar;
}
