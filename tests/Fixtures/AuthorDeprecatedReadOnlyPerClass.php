<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Accessor;
use Speakeasy\Serializer\Annotation\DeprecatedReadOnly;
use Speakeasy\Serializer\Annotation\ReadOnly;
use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @deprecated ReadOnly annotation is deprecated
 *
 * @XmlRoot("author")
 * @ReadOnly
 */
#[XmlRoot(name: 'author')]
#[DeprecatedReadOnly]
class AuthorDeprecatedReadOnlyPerClass
{
    /**
     * @ReadOnly
     * @SerializedName("id")
     */
    #[DeprecatedReadOnly]
    #[SerializedName(name: 'id')]
    private $id;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @Type("string")
     * @SerializedName("full_name")
     * @Accessor("getName")
     * @ReadOnly(false)
     */
    #[Type(name: 'string')]
    #[SerializedName(name: 'full_name')]
    #[Accessor(getter: 'getName')]
    #[DeprecatedReadOnly(readOnly: false)]
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}
