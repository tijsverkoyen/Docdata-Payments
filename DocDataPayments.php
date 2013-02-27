<?php
namespace TijsVerkoyen\DocDataPayments;

/**
 * Docdata Payments class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 * @version 2.0.0
 * @copyright Copyright (c) Tijs Verkoyen. All rights reserved.
 * @license BSD License
 */
class DocdataPayments
{
	const DEBUG = true;
	const VERSION = '2.0.9';

	/**
	 * The soapclient
	 *
	 * @var BaseSoapClient
	 */
	private $soapclient;

	/**
	 * The timeout
	 *
	 * @var int
	 */
	private $timeOut = 30;

	/**
	 * The user agent
	 *
	 * @var string
	 */
	private $userAgent;

	/**
	 * Returns the SoapClient instance
	 *
	 * @return BaseSoapClient
	 */
	public function getSoapClient()
	{
		// create the client if needed
		if (!$this->soapclient) {
			$options = array(
				'trace' => self::DEBUG,
				'exceptions' => false,
				'connection_timeout' => $this->getTimeout(),
				'user_agent' => $this->getUserAgent(),
				'cache_wsdl' => WSDL_CACHE_BOTH,
				'classmap' => $this->classMaps,
			);

			$this->soapClient = new \SoapClient($this->getWsdl(), $options);
		}

		return $this->soapClient;
	}

	/**
	 * Get the timeout that will be used
	 *
	 * @return int
	 */
	public function getTimeOut()
	{
		return (int) $this->timeOut;
	}

	/**
	 * Set the timeout
	 * After this time the request will stop. You should handle any errors triggered by this.
	 *
	 * @param int $seconds The timeout in seconds.
	 */
	public function setTimeOut($seconds)
	{
		$this->timeOut = (int) $seconds;
	}

	/**
	 * Get the user-agent that will be used.
	 * Our version will be prepended to yours.
	 * It will look like: "PHP DocDataPayments/<version> <your-user-agent>"
	 *
	 * @return string
	 */
	public function getUserAgent()
	{
		return (string) 'PHP DocDataPayments/' . self::VERSION . ' ' . $this->userAgent;
	}

	/**
	 * Set the user-agent for you application
	 * It will be appended to ours, the result will look like:
	 * "PHP DocDataPayments/<version> <your-user-agent>"
	 *
	 * @param string $userAgent Your user-agent, it should look like <app-name>/<app-version>.
	 */
	public function setUserAgent($userAgent)
	{
		$this->userAgent = (string) $userAgent;
	}
}
