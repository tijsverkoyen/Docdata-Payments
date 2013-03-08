<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\DocDataPayments;

/**
 * DocDataPayments Capture class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Capture extends BaseObject
{
    /**
     * @var string
     */
    protected $merchantCaptureId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    protected $amount;

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
     * @param string $merchantCaptureId
     */
    public function setMerchantCaptureId($merchantCaptureId)
    {
        $this->merchantCaptureId = $merchantCaptureId;
    }

    /**
     * @return string
     */
    public function getMerchantCaptureId()
    {
        return $this->merchantCaptureId;
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
