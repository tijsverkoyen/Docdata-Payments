<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Destination class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Destination extends BaseObject
{
	/**
	 * Name of the destination.
	 *
	 * @var Name
	 */
	private $name;

	/**
	 * Address of the destination.
	 *
	 * @var Address
	 */
	private $address;

	/**
	 * @param \TijsVerkoyen\DocDataPayments\Types\Address $address
	 */
	public function setAddress($address)
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
	public function setName($name)
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