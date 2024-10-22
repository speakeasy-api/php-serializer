<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\PostDeserialize;
use Speakeasy\Serializer\Annotation\PostSerialize;
use Speakeasy\Serializer\Annotation\PreSerialize;

class ObjectWithOnlyLifecycleCallbacks
{
    /**
     * @PreSerialize
     */
    #[PreSerialize]
    private function prepareForSerialization()
    {
    }

    /**
     * @PostSerialize
     */
    #[PostSerialize]
    private function cleanUpAfterSerialization()
    {
    }

    /**
     * @PostDeserialize
     */
    #[PostDeserialize]
    private function afterDeserialization()
    {
    }
}
