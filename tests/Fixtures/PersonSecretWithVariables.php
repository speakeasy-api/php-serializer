<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;
use Speakeasy\Serializer\Context;
use Speakeasy\Serializer\Metadata\PropertyMetadata;

class PersonSecretWithVariables
{
    /**
     * @Serializer\Type("string")
     */
    #[Serializer\Type(name: 'string')]
    public $name;

    /**
     * @Serializer\Type("string")
     * @Serializer\Expose(if="context.getDirection()==2 || object.test(property_metadata, context)")
     */
    #[Serializer\Type(name: 'string')]
    #[Serializer\Expose(if: 'context.getDirection()==2 || object.test(property_metadata, context)')]
    public $gender;

    public function test(PropertyMetadata $propertyMetadata, Context $context)
    {
        return true;
    }
}
