<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\TypedProperties;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "type", map = {
 *    "car": "Speakeasy\Serializer\Tests\Fixtures\TypedProperties\Car",
 * })
 */
#[Serializer\Discriminator(field: 'type', map: ['car' => 'Speakeasy\Serializer\Tests\Fixtures\TypedProperties\Car'])]
interface Vehicle
{
}
