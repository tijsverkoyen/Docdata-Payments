<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Chargeback class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Chargeback extends Object
{
    /**
     * @var string
     */
    protected $chargebackId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    protected $amount;

    /**
     * @var string
     */
    protected $reason;

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
     * @param string $chargebackId
     */
    public function setChargebackId($chargebackId)
    {
        $this->chargebackId = $chargebackId;
    }

    /**
     * @return string
     */
    public function getChargebackId()
    {
        return $this->chargebackId;
    }

    /**
     * @param string $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
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
