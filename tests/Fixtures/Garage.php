<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class Garage
{
    /**
     * @Type("array<Speakeasy\Serializer\Tests\Fixtures\Discriminator\Vehicle>")
     */
    #[Type(name: 'array<Speakeasy\Serializer\Tests\Fixtures\Discriminator\Vehicle>')]
    public $vehicles;

    public function __construct($vehicles)
    {
        $this->vehicles = $vehicles;
    }
}
