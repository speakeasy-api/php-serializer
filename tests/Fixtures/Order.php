<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlRoot;

/** @XmlRoot("order") */
#[XmlRoot(name: 'order')]
class Order
{
    /** @Type("Speakeasy\Serializer\Tests\Fixtures\Price") */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\Price')]
    private $cost;

    public function __construct(?Price $price = null)
    {
        $this->cost = $price ?: new Price(5);
    }
}
