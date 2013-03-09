<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\RequestSuccess;

/**
 * DocDataPayments CreateRequest class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class CreateSuccess extends RequestSuccess
{
    /**
     * Generated key identifying the merchant and payment order.
     *
     * @var string
     */
    protected $key;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\PaymentResponse
     */
    protected $paymentResponse;

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\PaymentResponse $paymentResponse
     */
    public function setPaymentResponse(PaymentResponse $paymentResponse)
    {
        $this->paymentResponse = $paymentResponse;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\PaymentResponse
     */
    public function getPaymentResponse()
    {
        return $this->paymentResponse;
    }
}
