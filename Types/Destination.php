<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Destination class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Destination extends Object
{
    /**
     * Name of the destination.
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\Name
     */
    protected $name;

    /**
     * Address of the destination.
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\Address
     */
    protected $address;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Name $name
     */
    public function setName(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Name
     */
    public function getName()
    {
        return $this->name;
    }
}
