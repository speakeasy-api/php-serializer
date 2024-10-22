<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlKeyValuePairs;

class NamedDateTimeImmutableArraysObject
{
    /**
     * @var array<string, \DateTimeImmutable>
     * @Type("array<string,DateTimeImmutable<'d.m.Y H:i:s'>>")
     * @XmlKeyValuePairs
     */
    #[Type(name: 'array<string,DateTimeImmutable<"d.m.Y H:i:s">>')]
    #[XmlKeyValuePairs]
    private $namedArrayWithFormattedDate;

    /**
     * @param array<string, \DateTimeImmutable> $namedArrayWithFormattedDate
     */
    public function __construct(array $namedArrayWithFormattedDate)
    {
        $this->namedArrayWithFormattedDate = $namedArrayWithFormattedDate;
    }

    /**
     * @return array<string, \DateTimeImmutable>
     */
    public function getNamedArrayWithFormattedDate(): array
    {
        return $this->namedArrayWithFormattedDate;
    }
}
