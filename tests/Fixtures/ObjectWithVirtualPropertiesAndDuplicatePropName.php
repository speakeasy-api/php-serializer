<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation as Serializer;
use Speakeasy\Serializer\Annotation\VirtualProperty;

class ObjectWithVirtualPropertiesAndDuplicatePropName
{
    protected $id;
    protected $name;

    /**
     * @VirtualProperty(name="foo")
     */
    #[VirtualProperty(name: 'foo')]
    public function getId()
    {
        return 'value';
    }

    /**
     * @Serializer\SerializedName("mood")
     *
     * @VirtualProperty(name="bar")
     */
    #[Serializer\SerializedName(name: 'mood')]
    #[VirtualProperty(name: 'bar')]
    public function getName()
    {
        return 'value';
    }
}
