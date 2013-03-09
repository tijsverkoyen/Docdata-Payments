<?php
namespace TijsVerkoyen\DocDataPayments\Base;

/**
 * DocDataPayments RequestSuccess class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class RequestSuccess extends Object
{
	/**
	 * @var \TijsVerkoyen\DocDataPayments\Types\Success
	 */
	protected $success;

	/**
	 * @param \TijsVerkoyen\DocDataPayments\Types\Success $success
	 */
	public function setSuccess(Success $success)
	{
		$this->success = $success;
	}

	/**
	 * @return \TijsVerkoyen\DocDataPayments\Types\Success
	 */
	public function getSuccess()
	{
		return $this->success;
	}
}
