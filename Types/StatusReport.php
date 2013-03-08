<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments StatusReport class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class StatusReport extends BaseObject
{
    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\ApproximateTotals
     */
    protected $approximateTotals;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Payment
     */
    protected $payment;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\ApproximateTotals $approximateTotals
     */
    public function setApproximateTotals($approximateTotals)
    {
        $this->approximateTotals = $approximateTotals;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\ApproximateTotals
     */
    public function getApproximateTotals()
    {
        return $this->approximateTotals;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Payment $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }
}
