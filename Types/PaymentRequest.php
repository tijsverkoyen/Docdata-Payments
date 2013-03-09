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
    protected $initialPaymentReference;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\PaymentReference $initialPaymentReference
     */
    public function setInitialPaymentReference($initialPaymentReference)
    {
        $this->initialPaymentReference = $initialPaymentReference;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\PaymentReference
     */
    public function getInitialPaymentReference()
    {
        return $this->initialPaymentReference;
    }
}
