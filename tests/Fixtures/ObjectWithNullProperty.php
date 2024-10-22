<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;

class ObjectWithNullProperty extends SimpleObject
{
    /**
     * @var null
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $nullProperty = null;

    /**
     * @return null
     */
    public function getNullProperty()
    {
        return $this->nullProperty;
    }
}
