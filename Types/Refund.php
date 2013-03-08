<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\DocDataPayments;

/**
 * DocDataPayments Refund class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Refund extends BaseObject
{
    /**
     * @var string
     */
    protected $merchantRefundId;

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
     * @param string $merchantRefundId
     */
    public function setMerchantRefundId($merchantRefundId)
    {
        $this->merchantRefundId = $merchantRefundId;
    }

    /**
     * @return string
     */
    public function getMerchantRefundId()
    {
        return $this->merchantRefundId;
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
