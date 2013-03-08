<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\DocDataPayments;

/**
 * DocDataPayments Authorization class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Authorization extends BaseObject
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @var Amount
     */
    protected $amount;

    /**
     * @var string
     */
    protected $confidenceLevel;

    /**
     * @var Capture
     */
    protected $capture;

    /**
     * @var Refund
     */
    protected $refund;

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
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
