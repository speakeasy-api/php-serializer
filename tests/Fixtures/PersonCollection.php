<?php

declare(strict_types=1);

namespace Speakeasy\Serializer\Tests\Fixtures;

use Doctrine\Common\Collections\ArrayCollection;
use Speakeasy\Serializer\Annotation\Type;
use Speakeasy\Serializer\Annotation\XmlList;
use Speakeasy\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("person_collection")
 */
#[XmlRoot(name: 'person_collection')]
class PersonCollection
{
    /**
     * @Type("ArrayCollection<Speakeasy\Serializer\Tests\Fixtures\Person>")
     * @XmlList(entry = "person", inline = true)
     */
    #[Type(name: 'ArrayCollection<Speakeasy\Serializer\Tests\Fixtures\Person>')]
    #[XmlList(entry: 'person', inline: true)]
    public $persons;

    /**
     * @Type("string")
     */
    #[Type(name: 'string')]
    public $location;

    public function __construct()
    {
        $this->persons = new ArrayCollection();
    }
}
