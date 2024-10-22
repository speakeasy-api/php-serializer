<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class VehicleInterfaceGarage
{
    /**
     * @Type("array<Speakeasy\Serializer\Tests\Fixtures\Discriminator\VehicleInterface>")
     */
    #[Type(name: 'array<Speakeasy\Serializer\Tests\Fixtures\Discriminator\VehicleInterface>')]
    public $vehicles;

    public function __construct($vehicles)
    {
        $this->vehicles = $vehicles;
    }
}
