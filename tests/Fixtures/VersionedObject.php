<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Since;
use Speakeasy\Serializer\Annotation\Until;

class VersionedObject
{
    /**
     * @Until("1.0.0")
     */
    #[Until(version: '1.0.0')]
    private $name;

    /**
     * @Since("1.0.1")
     * @SerializedName("name")
     */
    #[Since(version: '1.0.1')]
    #[SerializedName(name: 'name')]
    private $name2;

    public function __construct($name, $name2)
    {
        $this->name = $name;
        $this->name2 = $name2;
    }
}
