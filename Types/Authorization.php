<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Authorization class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Authorization extends Object
{
    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\AuthorizationStatus
     */
    protected $status;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    protected $amount;

    /**
     * @var string
     */
    protected $confidenceLevel;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Capture
     */
    protected $capture;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Refund
     */
    protected $refund;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Chargeback
     */
    protected $chargeback;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Amount $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Capture $capture
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Capture
     */
    public function getCapture()
    {
        return $this->capture;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Chargeback $chargeback
     */
    public function setChargeback($chargeback)
    {
        $this->chargeback = $chargeback;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Chargeback
     */
    public function getChargeback()
    {
        return $this->chargeback;
    }

    /**
     * @param string $confidenceLevel
     */
    public function setConfidenceLevel($confidenceLevel)
    {
        $this->confidenceLevel = $confidenceLevel;
    }

    /**
     * @return string
     */
    public function getConfidenceLevel()
    {
        return $this->confidenceLevel;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Refund $refund
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Refund
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\AuthorizationStatus $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\AuthorizationStatus
     */
    public function getStatus()
    {
        return $this->status;
    }
}
