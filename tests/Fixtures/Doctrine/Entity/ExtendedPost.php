<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\Doctrine\Entity;

use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 */
#[Entity]
class ExtendedPost extends BlogPost
{
}
