<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Accessor;
use Speakeasy\Serializer\Annotation\ReadOnlyProperty;
use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlRoot;

/** @XmlRoot("author") */
#[XmlRoot(name: 'author')]
class AuthorReadOnly
{
    /**
     * @ReadOnlyProperty
     * @SerializedName("id")
     */
    #[ReadOnlyProperty]
    #[SerializedName(name: 'id')]
    private $id;

    /**
     * @Type("string")
     * @SerializedName("full_name")
     * @Accessor("getName")
     */
    #[Type(name: 'string')]
    #[SerializedName(name: 'full_name')]
    #[Accessor(getter: 'getName')]
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}
