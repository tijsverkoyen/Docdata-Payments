<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Payment class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Payment extends Object
{
    /**
     * @var string
     */
    protected $id;

    /**
     * Payment method used for the payment.
     *
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Authorization
     */
    protected $authorization;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\PaymentInfo
     */
    protected $extended;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Authorization $authorization
     */
    public function setAuthorization($authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Authorization
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }
}
