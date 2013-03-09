<?php
namespace TijsVerkoyen\DocDataPayments\Base;

/**
 * DocDataPayments SuccessError class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class SuccessError extends Object
{
	/**
	 * @var string
	 */
	protected $code;

	/**
	 * @var array
	 */
	protected $explanations = array();

	/**
	 * @param string $code
	 */
	public function setCode($code)
	{
		$this->code = $code;
	}

	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Get a decent explanation
	 *
	 * @return string
	 */
	public function getExplanation()
	{
		return $this->explanations[$this->code];
	}
}
