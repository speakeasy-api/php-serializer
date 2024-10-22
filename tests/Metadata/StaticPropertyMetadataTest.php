<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Metadata;

use Speakeasy\Serializer\Metadata\StaticPropertyMetadata;

class StaticPropertyMetadataTest extends AbstractPropertyMetadataTestCase
{
    public function testSerialization()
    {
        $meta = new StaticPropertyMetadata('stdClass', 'foo', 'fooVal');
        $this->setNonDefaultMetadataValues($meta);

        $restoredMeta = unserialize(serialize($meta));
        self::assertEquals($meta, $restoredMeta);
    }
}
