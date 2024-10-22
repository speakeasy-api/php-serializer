<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Metadata;

use Speakeasy\Serializer\Metadata\VirtualPropertyMetadata;
use Speakeasy\Serializer\Tests\Fixtures\ObjectWithVirtualProperties;

class VirtualPropertyMetadataTest extends AbstractPropertyMetadataTestCase
{
    public function testSerialization()
    {
        $meta = new VirtualPropertyMetadata(ObjectWithVirtualProperties::class, 'getEmptyValue');
        $this->setNonDefaultMetadataValues($meta);

        $restoredMeta = unserialize(serialize($meta));
        self::assertEquals($meta, $restoredMeta);
    }
}
