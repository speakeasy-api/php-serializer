<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\Discriminator;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "type", map = {
 *    "car": "Speakeasy\Serializer\Tests\Fixtures\Discriminator\Car",
 *    "moped": "Speakeasy\Serializer\Tests\Fixtures\Discriminator\Moped",
 * })
 */
#[Serializer\Discriminator(field: 'type', map: ['car' => 'Speakeasy\Serializer\Tests\Fixtures\Discriminator\Car', 'moped' => 'Speakeasy\Serializer\Tests\Fixtures\Discriminator\Moped'])]
interface VehicleInterface
{
}
