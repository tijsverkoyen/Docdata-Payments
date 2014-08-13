<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments RefundRequest class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class RefundRequest extends Object
{
    /**
     * Merchant's credentials.
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\Merchant
     */
    protected $merchant;

    /**
     * Payment id with check digit identifying the payment.
     *
     * @var string
     */
    protected $paymentId;

    /**
     * Merchant's internal ID for identifying this refund.
     *
     * @var string
     */
    protected $merchantRefundReference;

    /**
     * Optional amount to refund
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    protected $amount;

    /**
     * A code or article number identifying an earlier supplied item. Needs to
     * be unique under the payment order the payment is associated with.
     *
     * @var strings
     */
    protected $itemCode;

    /**
     * Optional description for this refund.
     *
     * @var string
     */
    protected $description;

    /**
     * Indicator if any reserved (new) refunds should be canceled in favor of
     * this refund. Default is false, meaning that this new refund is in
     * addition to already reserved refunds.
     *
     * @var bool
     */
    protected $cancelReserved;

    /**
     * The date on which to refund. The first opportunity after this date for a
     * refund will be used. The default is as soon as possible.
     *
     * @var string
     */
    protected $requiredRefundDate;

    /**
     * Optionally, refund bank account information for payment methods for
     * which no information is available yet. Will be ignored if provided here,
     * but not needed e.g. for iDEAL or credit card refunds.
     *
     * @var  \TijsVerkoyen\DocDataPayments\Types\SepaBankAccount
     */
    protected $refundBankAccount;

    /**
     * @var string
     */
    protected $version = '1.2';

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
     * @param boolean $cancelReserved
     */
    public function setCancelReserved($cancelReserved)
    {
        $this->cancelReserved = $cancelReserved;
    }

    /**
     * @return boolean
     */
    public function getCancelReserved()
    {
        return $this->cancelReserved;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\strings $itemCode
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\strings
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Merchant $merchant
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Merchant
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param string $merchantRefundReference
     */
    public function setMerchantRefundReference($merchantRefundReference)
    {
        $this->merchantRefundReference = $merchantRefundReference;
    }

    /**
     * @return string
     */
    public function getMerchantRefundReference()
    {
        return $this->merchantRefundReference;
    }

    /**
     * @param string $paymentId
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\SepaBankAccount $refundBankAccount
     */
    public function setRefundBankAccount($refundBankAccount)
    {
        $this->refundBankAccount = $refundBankAccount;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\SepaBankAccount
     */
    public function getRefundBankAccount()
    {
        return $this->refundBankAccount;
    }

    /**
     * @param string $requiredRefundDate
     */
    public function setRequiredRefundDate($requiredRefundDate)
    {
        $this->requiredRefundDate = $requiredRefundDate;
    }

    /**
     * @return string
     */
    public function getRequiredRefundDate()
    {
        return $this->requiredRefundDate;
    }
}
