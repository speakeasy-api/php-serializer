<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;

class MoreSpecificAuthor
{
    /**
     * @Type("string")
     * @SerializedName("full_name")
     */
    #[Type(name: 'string')]
    #[SerializedName(name: 'full_name')]
    private $name;

    /**
     * @Type("bool")
     */
    #[Type(name: 'bool')]
    private $isMoreSpecific;

    public function __construct($name, $isMoreSpecific)
    {
        $this->name = $name;
        $this->isMoreSpecific = $isMoreSpecific;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIsMoreSpecific()
    {
        return $this->isMoreSpecific;
    }
}
