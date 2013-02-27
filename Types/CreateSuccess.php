<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments CreateRequest class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class CreateSuccess extends BaseObject
{
    /**
     * Generated key identifying the merchant and payment order.
     * @var string
     */
    protected $key;

    /**
     * @var Success
     */
    protected $success;

    /**
     * @var PaymentResponse
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
