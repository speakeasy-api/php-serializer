<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures\DocBlockType\Phpstan\Sub;

/**
 * @phpstan-type Settings array{
 *  method: string,
 *  amount: array{type: string, value: string|null}
 * }
 */
final class PhpstanArrayShapeToImport
{
    /**
     * @var Settings
     */
    public $data;
}
