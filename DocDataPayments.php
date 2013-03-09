<?php
namespace TijsVerkoyen\DocDataPayments;

use TijsVerkoyen\DocDataPayments\Types\Amount;
use TijsVerkoyen\DocDataPayments\Types\CancelRequest;
use TijsVerkoyen\DocDataPayments\Types\CreateRequest;
use TijsVerkoyen\DocDataPayments\Types\Destination;
use TijsVerkoyen\DocDataPayments\Types\Invoice;
use TijsVerkoyen\DocDataPayments\Types\MenuPreferences;
use TijsVerkoyen\DocDataPayments\Types\Merchant;
use TijsVerkoyen\DocDataPayments\Types\PaymentPreferences;
use TijsVerkoyen\DocDataPayments\Types\PaymentRequest;
use TijsVerkoyen\DocDataPayments\Types\PaymentRequestInput;
use TijsVerkoyen\DocDataPayments\Types\Shopper;
use TijsVerkoyen\DocDataPayments\Types\StatusRequest;

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
    const DEBUG = false;
    const VERSION = '2.0.2';

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Merchant
     */
    private $merchant;

    /**
     * The soapclient
     *
     * @var \SoapClient
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
        'amexPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\AmexPaymentInfo',
        'amount' => 'TijsVerkoyen\DocDataPayments\Types\Amount',
        'approximateTotals' => 'TijsVerkoyen\DocDataPayments\Types\ApproximateTotals',
        'authorization' => 'TijsVerkoyen\DocDataPayments\Types\Authorization',
        'bankTransferPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\BankTransferPaymentInfo',
        'cancelError' => 'TijsVerkoyen\DocDataPayments\Types\CancelError',
        'cancelSuccess' => 'TijsVerkoyen\DocDataPayments\Types\CancelSuccess',
        'capture' => 'TijsVerkoyen\DocDataPayments\Types\Capture',
        'chargeback' => 'TijsVerkoyen\DocDataPayments\Types\Chargeback',
        'country' => 'TijsVerkoyen\DocDataPayments\Types\Country',
        'createError' => 'TijsVerkoyen\DocDataPayments\Types\CreateError',
        'createSuccess' => 'TijsVerkoyen\DocDataPayments\Types\CreateSuccess',
        'destination' => 'TijsVerkoyen\DocDataPayments\Types\Destination',
        'error' => 'TijsVerkoyen\DocDataPayments\Types\Error',
        'giftCardPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\GiftCardPaymentInfo',
        'iDealPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\IDealPaymentInfo',
        'invoice' => 'TijsVerkoyen\DocDataPayments\Types\Invoice',
        'item' => 'TijsVerkoyen\DocDataPayments\Types\Item',
        'language' => 'TijsVerkoyen\DocDataPayments\Types\Language',
        'maestroPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\MaestroPaymentInfo',
        'masterCardPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInfo',
        'menuPreferences' => 'TijsVerkoyen\DocDataPayments\Types\MenuPreferences',
        'merchant' => 'TijsVerkoyen\DocDataPayments\Types\Merchant',
        'misterCashPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\MisterCashPaymentInfo',
        'name' => 'TijsVerkoyen\DocDataPayments\Types\name',
        'payment' => 'TijsVerkoyen\DocDataPayments\Types\Payment',
        'paymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\PaymentInfo',
        'paymentPreferences' => 'TijsVerkoyen\DocDataPayments\Types\PaymentPreferences',
        'paymentReference' => 'TijsVerkoyen\DocDataPayments\Types\PaymentReference',
        'paymentRequestInput' => 'TijsVerkoyen\DocDataPayments\Types\PaymentRequestInput',
        'paymentResponse' => 'TijsVerkoyen\DocDataPayments\Types\PaymentResponse',
        'quantity' => 'TijsVerkoyen\DocDataPayments\Types\Quantity',
        'refund' => 'TijsVerkoyen\DocDataPayments\Types\Refund',
        'riskCheck' => 'TijsVerkoyen\DocDataPayments\Types\RiskCheck',
        'shopper' => 'TijsVerkoyen\DocDataPayments\Types\Shopper',
        'statusError' => 'TijsVerkoyen\DocDataPayments\Types\StatusError',
        'statusReport' => 'TijsVerkoyen\DocDataPayments\Types\StatusReport',
        'statusSuccess' => 'TijsVerkoyen\DocDataPayments\Types\StatusSuccess',
        'success' => 'TijsVerkoyen\DocDataPayments\Types\Success',
        'vat' => 'TijsVerkoyen\DocDataPayments\Types\Vat',
        'visaPaymentInfo' => 'TijsVerkoyen\DocDataPayments\Types\VisaPaymentInfo',
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
     * @return \SoapClient
     */
    protected function getSoapClient()
    {
        // create the client if needed
        if (!$this->soapclient) {
            $options = array(
                'trace' => self::DEBUG,
                'exceptions' => true,
                'connection_timeout' => $this->getTimeout(),
                'user_agent' => $this->getUserAgent(),
                'cache_wsdl' => (self::DEBUG) ? WSDL_CACHE_NONE : WSDL_CACHE_BOTH,
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
     * @param  string                                                          $merchantOrderReference
     * @param  TijsVerkoyen\DocDataPayments\Types\Shopper                      $shopper
     * @param  TijsVerkoyen\DocDataPayments\Types\Amount                       $totalGrossAmount
     * @param  TijsVerkoyen\DocDataPayments\Types\Destination                  $billTo
     * @param  string[optional]                                                $description
     * @param  string[optional]                                                $receiptText
     * @param  TijsVerkoyen\DocDataPayments\Types\PaymentPreferences[optional] $paymentPreferences
     * @param  TijsVerkoyen\DocDataPayments\Types\MenuPreferences[optional]    $menuPreferences
     * @param  TijsVerkoyen\DocDataPayments\Types\PaymentRequest[optional]     $paymentRequest
     * @param  TijsVerkoyen\DocDataPayments\Types\Invoice[optional]            $invoice
     * @param  bool[optional]                                                  $includeCosts
     * @return TijsVerkoyen\DocDataPayments\Types\CreateSuccess
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

    /**
     * The cancel command is used for canceling a previously created payment,
     * and can only be used for payments with status NEW, STARTED and
     * AUTHORIZED.
     *
     * @param  string                                           $paymentOrderKey
     * @return TijsVerkoyen\DocDataPayments\Types\CancelSuccess
     */
    public function cancel($paymentOrderKey)
    {
        $cancelRequest = new CancelRequest();
        $cancelRequest->setMerchant($this->merchant);
        $cancelRequest->setPaymentOrderKey($paymentOrderKey);

        // make the call
        $response = $this->getSoapClient()->cancel($cancelRequest->toArray());

        // validate response
        if (isset($response->cancelError)) {
            if (self::DEBUG) {
                var_dump($this->soapClient->__getLastRequest());
                var_dump($response->cancelError);
            }

            throw new Exception(
                $response->cancelError->getError()->getExplanation()
            );
        }

        return $response->cancelSuccess;
    }

    /**
     * The status call can be used to get a report on the current status of a Payment Order, its payments and its
     * captures or refunds. It can be used to determine whether an order is considered paid, to retrieve a payment ID,
     * to get information on the statuses of captures/refunds.
     *
     * @param  string                                           $paymentOrderKey
     * @return TijsVerkoyen\DocDataPayments\Types\StatusSuccess
     */
    public function status($paymentOrderKey)
    {
        $statusRequest = new StatusRequest();
        $statusRequest->setMerchant($this->merchant);
        $statusRequest->setPaymentOrderKey($paymentOrderKey);

        // make the call
        $response = $this->getSoapClient()->status($statusRequest->toArray());

        // validate response
        if (isset($response->statusError)) {
            if (self::DEBUG) {
                var_dump($this->soapClient->__getLastRequest());
                var_dump($response->statusError);
            }

            throw new Exception(
                $response->statusError->getError()->getExplanation()
            );
        }

        return $response->statusSuccess;
    }

    /**
     * Get the payment url
     *
     * @param string           $clientLanguage
     * @param string           $paymentClusterKey
     * @param string[optional] $successUrl        Merchant’s web page where the shopper will be sent to after a
     *                                                  successful transaction. Mandatory in back office.
     * @param string[optional] $canceledUrl Merchant’s web page where the shopper will be sent to if they
     *                                                  cancel their transaction. Mandatory in back office.
     * @param string[optional] $pendingUrl Merchant’s web page where the shopper will be sent to if a
     *                                                  payment is started successfully but not yet paid.
     * @param string[optional] $errorUrl Merchant’s web page where the shopper will be sent to if an
     *                                                  error occurs.
     * @param string[optional] $defaultPaymentMethod ID of the default payment method.
     * @param string[optional] $defaultAct           If a default payment method is declared to direct the shopper
     *                                                  to that payment method in the payment menu. Can contain the
     *                                                  values “yes” or “no”.
     * @param  bool[optional] $production Production mode?
     * @return string
     */
    public function getPaymentUrl(
        $clientLanguage,
        $paymentClusterKey,
        $successUrl = null,
        $canceledUrl = null,
        $pendingUrl = null,
        $errorUrl = null,
        $defaultPaymentMethod = null,
        $defaultAct = null,
        $production = true
    ) {
        $parameters = array();
        $parameters['command'] = 'show_payment_cluster';
        $parameters['merchant_name'] = $this->merchant->getName();
        $parameters['client_language'] = (string) $clientLanguage;
        $parameters['payment_cluster_key'] = (string) $paymentClusterKey;

        if ($successUrl !== null) {
            $parameters['return_url_success'] = $successUrl;
        }
        if ($canceledUrl !== null) {
            $parameters['return_url_canceled'] = $canceledUrl;
        }
        if ($pendingUrl !== null) {
            $parameters['return_url_pending'] = $pendingUrl;
        }
        if ($errorUrl !== null) {
            $parameters['return_url_error'] = $errorUrl;
        }
        if ($defaultPaymentMethod !== null) {
            $parameters['default_pm'] = $defaultPaymentMethod;
        }
        if ($defaultAct !== null) {
            $parameters['default_act'] = $defaultAct;
        }

        if ($production) {
            $base = 'https://www.docdatapayments.com/ps/com.tripledeal.paymentservice.servlets.PaymentService';
        } else {
            $base = 'https://test.docdatapayments.com/ps/com.tripledeal.paymentservice.servlets.PaymentService';
        }

        // build the url
        return $base . '?' . http_build_query($parameters);
    }

    /**
     * Redirect to the payment url
     *
     * @param string           $clientLanguage
     * @param string           $paymentClusterKey
     * @param string[optional] $successUrl        Merchant’s web page where the shopper will be sent to after a
     *                                                  successful transaction. Mandatory in back office.
     * @param string[optional] $canceledUrl Merchant’s web page where the shopper will be sent to if they
     *                                                  cancel their transaction. Mandatory in back office.
     * @param string[optional] $pendingUrl Merchant’s web page where the shopper will be sent to if a
     *                                                  payment is started successfully but not yet paid.
     * @param string[optional] $errorUrl Merchant’s web page where the shopper will be sent to if an
     *                                                  error occurs.
     * @param string[optional] $defaultPaymentMethod ID of the default payment method.
     * @param string[optional] $defaultAct           If a default payment method is declared to direct the shopper
     *                                                  to that payment method in the payment menu. Can contain the
     *                                                  values “yes” or “no”.
     * @param bool[optional] $production Production mode?
     */
    public function redirectToPaymentUrl(
        $clientLanguage,
        $paymentClusterKey,
        $successUrl = null,
        $canceledUrl = null,
        $pendingUrl = null,
        $errorUrl = null,
        $defaultPaymentMethod = null,
        $defaultAct = null,
        $production = true
    ) {
        // get the url
        $url = $this->getPaymentUrl(
            $clientLanguage,
            $paymentClusterKey,
            $successUrl,
            $canceledUrl,
            $pendingUrl,
            $errorUrl,
            $defaultPaymentMethod,
            $defaultAct,
            $production
        );

        // redirect
        header('location: ' . $url);
        exit();
    }
}
