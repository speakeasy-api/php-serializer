<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlRoot;
use Speakeasy\Serializer\Annotation\XmlValue;

/**
 * @XmlRoot("price")
 */
#[XmlRoot(name: 'price')]
class Price
{
    /**
     * @Type("float")
     * @XmlValue
     */
    #[Type(name: 'float')]
    #[XmlValue]
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }
}
