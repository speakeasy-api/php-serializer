<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\VirtualProperty;

#[MissingAttribute]
final class MissingAttributeObject
{
    #[MissingAttribute]
    public $property;

    /**
     * @VirtualProperty(name="propertyFromMethod")
     */
    #[MissingAttribute]
    #[VirtualProperty(name: 'propertyFromMethod')]
    public function propertyMethod()
    {
        return '';
    }
}
