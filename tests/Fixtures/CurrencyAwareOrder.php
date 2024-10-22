<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlRoot;

/** @XmlRoot("order") */
#[XmlRoot(name: 'order')]
class CurrencyAwareOrder
{
    /** @Type("Speakeasy\Serializer\Tests\Fixtures\CurrencyAwarePrice") */
    #[Type(name: 'Speakeasy\Serializer\Tests\Fixtures\CurrencyAwarePrice')]
    private $cost;

    public function __construct(?CurrencyAwarePrice $price = null)
    {
        $this->cost = $price ?: new CurrencyAwarePrice(5);
    }
}
