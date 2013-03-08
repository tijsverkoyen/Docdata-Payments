<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments PaymentRequest class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class PaymentRequest extends BaseObject
{
    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\PaymentReference
     */
    protected $paymentReference;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\PaymentReference $paymentReference
     */
    public function setPaymentReference(PaymentReference $paymentReference)
    {
        $this->paymentReference = $paymentReference;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\PaymentReference
     */
    public function getPaymentReference()
    {
        return $this->paymentReference;
    }
}
