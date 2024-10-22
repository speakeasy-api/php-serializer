<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\Discriminator;

use Speakeasy\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "type", map = {
 *    "child": "Speakeasy\Serializer\Tests\Fixtures\Discriminator\ObjectWithXmlNotCDataDiscriminatorChild"
 * })
 * @Serializer\XmlDiscriminator(cdata=false)
 */
#[Serializer\Discriminator(field: 'type', map: ['child' => 'Speakeasy\Serializer\Tests\Fixtures\Discriminator\ObjectWithXmlNotCDataDiscriminatorChild'])]
#[Serializer\XmlDiscriminator(cdata: false)]
abstract class ObjectWithXmlNotCDataDiscriminatorParent
{
}
