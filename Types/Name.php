<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Name class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Name extends BaseObject
{
	/**
	 * For example: Mr., Mrs., Ms., Dr. This field is commonly omitted.
	 * @var string
	 */
	private $prefix;

	/**
	 * The initials.
	 * @var string
	 */
	private $initials;

	/**
	 * The first given name.
	 * @var string
	 */
	private $first;

	/**
	 * Any subsequent given name or names. May also be used as middle initial.
	 * @var string
	 */
	private $middle;

	/**
	 * The family or inherited name(s).
	 * @var string
	 */
	private $last;

	/**
	 * For example: Ph.D., Jr. (Junior), 3rd, Esq. (Exquire). This field is
	 * commonly omitted.
	 * @var string
	 */
	private $suffix;

	/**
	 * @param string $first
	 */
	public function setFirst($first)
	{
		$this->first = $first;
	}

	/**
	 * @return string
	 */
	public function getFirst()
	{
		return $this->first;
	}

	/**
	 * @param string $initials
	 */
	public function setInitials($initials)
	{
		$this->initials = $initials;
	}

	/**
	 * @return string
	 */
	public function getInitials()
	{
		return $this->initials;
	}

	/**
	 * @param string $last
	 */
	public function setLast($last)
	{
		$this->last = $last;
	}

	/**
	 * @return string
	 */
	public function getLast()
	{
		return $this->last;
	}

	/**
	 * @param string $middle
	 */
	public function setMiddle($middle)
	{
		$this->middle = $middle;
	}

	/**
	 * @return string
	 */
	public function getMiddle()
	{
		return $this->middle;
	}

	/**
	 * @param string $prefix
	 */
	public function setPrefix($prefix)
	{
		$this->prefix = $prefix;
	}

	/**
	 * @return string
	 */
	public function getPrefix()
	{
		return $this->prefix;
	}

	/**
	 * @param string $suffix
	 */
	public function setSuffix($suffix)
	{
		$this->suffix = $suffix;
	}

	/**
	 * @return string
	 */
	public function getSuffix()
	{
		return $this->suffix;
	}
}