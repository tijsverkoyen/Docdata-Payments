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
use TijsVerkoyen\DocDataPayments\Types\Invoice;
use TijsVerkoyen\DocDataPayments\Types\Item;
use TijsVerkoyen\DocDataPayments\Types\Language;
use TijsVerkoyen\DocDataPayments\Types\MenuPreferences;
use TijsVerkoyen\DocDataPayments\Types\Merchant;
use TijsVerkoyen\DocDataPayments\Types\Name;
use TijsVerkoyen\DocDataPayments\Types\PaymentPreferences;
use TijsVerkoyen\DocDataPayments\Types\PaymentReference;
use TijsVerkoyen\DocDataPayments\Types\PaymentRequest;
use TijsVerkoyen\DocDataPayments\Types\PaymentResponse;
use TijsVerkoyen\DocDataPayments\Types\Quantity;
use TijsVerkoyen\DocDataPayments\Types\Shopper;
use TijsVerkoyen\DocDataPayments\Types\Success;
use TijsVerkoyen\DocDataPayments\Types\Vat;

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
        'invoice' => 'TijsVerkoyen\DocDataPayments\Types\Invoice',
        'item' => 'TijsVerkoyen\DocDataPayments\Types\Item',
        'language' => 'TijsVerkoyen\DocDataPayments\Types\Language',
        'menuPreferences' => 'TijsVerkoyen\DocDataPayments\Types\MenuPreferences',
        'merchant' => 'TijsVerkoyen\DocDataPayments\Types\Merchant',
        'name' => 'TijsVerkoyen\DocDataPayments\Types\name',
        'paymentPreferences' => 'TijsVerkoyen\DocDataPayments\Types\PaymentPreferences',
        'paymentReference' => 'TijsVerkoyen\DocDataPayments\Types\PaymentReference',
        'paymentResponse' => 'TijsVerkoyen\DocDataPayments\Types\PaymentResponse',
        'paymentRequest' => 'TijsVerkoyen\DocDataPayments\Types\PaymentRequest',
        'quantity' => 'TijsVerkoyen\DocDataPayments\Types\Quantity',
        'shopper' => 'TijsVerkoyen\DocDataPayments\Types\Shopper',
        'success' => 'TijsVerkoyen\DocDataPayments\Types\Success',
        'vat' => 'TijsVerkoyen\DocDataPayments\Types\Vat',
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

    /**
     * The goal of the create operation is solely to create a payment order on
     * Docdata Payments system. Creating a payment order is always the first
     * step of any workflow in Docdata Payments payment service.
     *
     * After an order is created, payments can be made on this order; either
     * through (the shopper via) the web menu or through the API by the
     * merchant. If the order has been created using information on specific
     * order items, the web menu can make use of this information by displaying
     * a shopping cart.
     *
     * @param  string                       $merchantOrderReference
     * @param  Shopper                      $shopper
     * @param  Amount                       $totalGrossAmount
     * @param  Destination                  $billTo
     * @param  string[optional]             $description
     * @param  string[optional]             $receiptText
     * @param  PaymentPreferences[optional] $paymentPreferences
     * @param  MenuPreferences[optional]    $menuPreferences
     * @param  PaymentRequest[optional]     $paymentRequest
     * @param  Invoice[optional]            $invoice
     * @param  bool[optional]               $includeCosts
     * @return CreateSuccess
     */
    public function create(
        $merchantOrderReference,
        Shopper $shopper,
        Amount $totalGrossAmount,
        Destination $billTo,
        PaymentPreferences $paymentPreferences = null,
        $description = null,
        $receiptText = null,
        MenuPreferences $menuPreferences = null,
        PaymentRequest $paymentRequest = null,
        Invoice $invoice = null,
        $includeCosts = null
    ) {
        $createRequest = new CreateRequest();
        $createRequest->setMerchant($this->merchant);
        $createRequest->setMerchantOrderReference($merchantOrderReference);
        $createRequest->setShopper($shopper);
        $createRequest->setTotalGrossAmount($totalGrossAmount);
        $createRequest->setBillTo($billTo);
        if ($description !== null) {
            $createRequest->setDescription($description);
        }
        if ($receiptText !== null) {
            $createRequest->setReceiptText($receiptText);
        }
        if ($paymentPreferences != null) {
            $createRequest->setPaymentPreferences($paymentPreferences);
        }
        if ($menuPreferences !== null) {
            $createRequest->setMenuPreferences($menuPreferences);
        }
        if ($paymentRequest !== null) {
            $createRequest->setPaymentRequest($paymentRequest);
        }
        if ($invoice !== null) {
            $createRequest->setInvoice($invoice);
        }
        if ($includeCosts !== null) {
            $createRequest->setIncludeCosts($includeCosts);
        }

        var_dump($createRequest->toArray());

        // make the call
        $response = $this->getSoapClient()->create($createRequest->toArray());

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
