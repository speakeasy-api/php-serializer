<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Serializer;

use Speakeasy\Serializer\SerializerBuilder;
use Speakeasy\Serializer\Visitor\Factory\JsonDeserializationVisitorFactory;
use PHPUnit\Framework\Attributes\DataProvider;

class JsonStrictSerializationTest extends JsonSerializationTest
{
    protected function extendBuilder(SerializerBuilder $builder): void
    {
        parent::extendBuilder($builder);

        $builder->setDeserializationVisitor('json', new JsonDeserializationVisitorFactory(true));
    }

    /**
     * @dataProvider getFirstClassMapCollectionsValues
     */
    #[DataProvider('getFirstClassMapCollectionsValues')]
    public function testFirstClassMapCollections(array $items, string $expected): void
    {
        self::markTestIncomplete('Fixtures are broken');
    }
}
