<?php
namespace TijsVerkoyen\DocDataPayments;

use TijsVerkoyen\DocDataPayments\Types\Address;
use TijsVerkoyen\DocDataPayments\Types\Amount;
use TijsVerkoyen\DocDataPayments\Types\Country;
use TijsVerkoyen\DocDataPayments\Types\CreateError;
use TijsVerkoyen\DocDataPayments\Types\CreateRequest;
use TijsVerkoyen\DocDataPayments\Types\CreateSuccess;
use TijsVerkoyen\DocDataPayments\Types\Destination;
use TijsVerkoyen\DocDataPayments\Types\Error;
use TijsVerkoyen\DocDataPayments\Types\Language;
use TijsVerkoyen\DocDataPayments\Types\Merchant;
use TijsVerkoyen\DocDataPayments\Types\Name;
use TijsVerkoyen\DocDataPayments\Types\PaymentPreferences;
use TijsVerkoyen\DocDataPayments\Types\Shopper;
use TijsVerkoyen\DocDataPayments\Types\Success;

/**
 * Docdata Payments class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 * @version 2.0.0
 * @copyright Copyright (c) Tijs Verkoyen. All rights reserved.
 * @license BSD License
 */
class DocDataPayments
{
    const DEBUG = true;
    const VERSION = '2.0.0';

    /**
     * @var Merchant
     */
    private $merchant;

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
     * The WSDL location
     *
     * @var string
     */
    private $wsdl;

    /**
     * @var array
     */
    private $classMaps = array(
        'address' => 'TijsVerkoyen\DocDataPayments\Types\Address',
        'amount' => 'TijsVerkoyen\DocDataPayments\Types\Amount',
        'country' => 'TijsVerkoyen\DocDataPayments\Types\Country',
        'createError' => 'TijsVerkoyen\DocDataPayments\Types\CreateError',
        'createRequest' => 'TijsVerkoyen\DocDataPayments\Types\CreateRequest',
        'createSuccess' => 'TijsVerkoyen\DocDataPayments\Types\CreateSuccess',
        'destination' => 'TijsVerkoyen\DocDataPayments\Types\Destination',
        'error' => 'TijsVerkoyen\DocDataPayments\Types\Error',
        'language' => 'TijsVerkoyen\DocDataPayments\Types\Language',
        'merchant' => 'TijsVerkoyen\DocDataPayments\Types\Merchant',
        'name' => 'TijsVerkoyen\DocDataPayments\Types\name',
        'paymentPreferences' => 'TijsVerkoyen\DocDataPayments\Types\PaymentPreferences',
        'shopper' => 'TijsVerkoyen\DocDataPayments\Types\Shopper',
        'success' => 'TijsVerkoyen\DocDataPayments\Types\Success',
    );

    /**
     * Default constructor
     *
     * @param string[optional] $wsdl The location of the WSDL-file
     */
    public function __construct($wsdl)
    {
        if ($wsdl !== null) {
            $this->setWsdl($wsdl);
        }
    }

    /**
     * Returns the SoapClient instance
     *
     * @return BaseSoapClient
     */
    protected function getSoapClient()
    {
        // create the client if needed
        if (!$this->soapclient) {
            $options = array(
                'trace' => self::DEBUG,
                'exceptions' => false,
                'connection_timeout' => $this->getTimeout(),
                'user_agent' => $this->getUserAgent(),
                'cache_wsdl' => (self::DEBUG) ? false : WSDL_CACHE_BOTH,
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

    /**
     * Get the wsdl
     *
     * @return string
     */
    public function getWsdl()
    {
        return (string) $this->wsdl;
    }

    /**
     * Set the WSDL to use
     *
     * @param string $wsdl
     */
    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;
    }

    /**
     * Set the credentials that will be used
     *
     * @param string $username
     * @param string $password
     */
    public function setCredentials($username, $password)
    {
        $this->merchant = new Merchant();
        $this->merchant->setName($username);
        $this->merchant->setPassword($password);
    }

    public function create(
        $merchantOrderReference,
        Shopper $shopper,
        Amount $totalGrossAmount,
        Destination $billTo,
        PaymentPreferences $paymentPreferences = null,
        $menuPreferences = null
    )
    {
        $createRequest = new CreateRequest();
        $createRequest->setMerchant($this->merchant);
        $createRequest->setMerchantOrderReference($merchantOrderReference);
        $createRequest->setShopper($shopper);
        $createRequest->setTotalGrossAmount($totalGrossAmount);
        $createRequest->setBillTo($billTo);
        if ($paymentPreferences != null) {
            $createRequest->setPaymentPreferences($paymentPreferences);
        }

        $response = $this->getSoapClient()->create($createRequest);

        // validate response
        if (isset($response->createError)) {
            if (self::DEBUG) {
                var_dump($this->soapClient->__getLastRequest());
                var_dump($response->createError);
            }

            throw new Exception(
                $response->createError->getError()->getExplanation()
            );
        }

        return $response->createSuccess;
    }
}
