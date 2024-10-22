<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Exclude;
use Speakeasy\Serializer\Annotation\PostDeserialize;
use Speakeasy\Serializer\Annotation\PostSerialize;
use Speakeasy\Serializer\Annotation\PreSerialize;
use Speakeasy\Serializer\Annotation\Type;

class ObjectWithLifecycleCallbacks
{
    /**
     * @Exclude
     */
    #[Exclude]
    private $firstname;

    /**
     * @Exclude
     */
    #[Exclude]
    private $lastname;

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    private $name;

    public function __construct($firstname = 'Foo', $lastname = 'Bar')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    /**
     * @PreSerialize
     */
    #[PreSerialize]
    private function prepareForSerialization()
    {
        $this->name = $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @PostSerialize
     */
    #[PostSerialize]
    private function cleanUpAfterSerialization()
    {
        $this->name = null;
    }

    /**
     * @PostDeserialize
     */
    #[PostDeserialize]
    private function afterDeserialization()
    {
        [$this->firstname, $this->lastname] = explode(' ', $this->name);
        $this->name = null;
    }
}
