<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Groups;
use Speakeasy\Serializer\Annotation\SerializedName;
use Speakeasy\Serializer\Annotation\Since;
use Speakeasy\Serializer\Annotation\Until;
use Speakeasy\Serializer\Annotation\VirtualProperty;

/**
 * dummy comment
 *
 * @VirtualProperty(
 *     "classlow",
 *     exp="object.getVirtualValue(1)",
 *     options={@Until("8")}
 * )
 * @VirtualProperty(
 *     "classhigh",
 *     exp="object.getVirtualValue(8)",
 *     options={@Since("6")}
 * )
 */
#[VirtualProperty(name: 'classlow', exp: 'object.getVirtualValue(1)', options: [[Until::class, ['8']]])]
#[VirtualProperty(name: 'classhigh', exp: 'object.getVirtualValue(8)', options: [[Since::class, ['6']]])]
class ObjectWithVersionedVirtualProperties
{
    /**
     * @Groups({"versions"})
     * @VirtualProperty
     * @SerializedName("low")
     * @Until("8")
     */
    #[Groups(groups: ['versions'])]
    #[VirtualProperty]
    #[SerializedName(name: 'low')]
    #[Until(version: '8')]
    public function getVirtualLowValue()
    {
        return 1;
    }

    /**
     * @Groups({"versions"})
     * @VirtualProperty
     * @SerializedName("high")
     * @Since("6")
     */
    #[Groups(groups: ['versions'])]
    #[VirtualProperty]
    #[SerializedName(name: 'high')]
    #[Since(version: '6')]
    public function getVirtualHighValue()
    {
        return 8;
    }

    /**
     * @param int $int
     *
     * @return int
     */
    public function getVirtualValue($int)
    {
        return $int;
    }
}
