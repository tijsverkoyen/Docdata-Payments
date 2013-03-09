<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments StartRequest class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class StartRequest extends Object
{
    /**
     * Merchant credentials.
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\Merchant
     */
    protected $merchant;

    /**
     * Payment order key belonging to the order which needs to be canceled.
     *
     * @var string
     */
    protected $paymentOrderKey;

    /**
     * Optionally specifies the details needed for starting a payment for a shopper without showing the hosted
     * payment pages. Must be specified if not a subsequent recurring payment.
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\PaymentRequestInput
     */
    protected $payment;

    /**
     * Optionally specifies a request for a recurring payment. It should target an existing previous payment that will
     * be used to start a new payment with directly. Reservations are also made as the starting point for upcoming
     * repeated payments if needed. Must be specified if not giving direct payment request input.
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\PaymentRequest
     */
    protected $recurringPaymentRequest;

    /**
     * @var string
     */
    protected $version = '1.0';

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\PaymentRequest $recurringPaymentRequest
     */
    public function setRecurringPaymentRequest($recurringPaymentRequest)
    {
        $this->recurringPaymentRequest = $recurringPaymentRequest;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\PaymentRequest
     */
    public function getRecurringPaymentRequest()
    {
        return $this->recurringPaymentRequest;
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
     * @param \TijsVerkoyen\DocDataPayments\Types\PaymentRequestInput $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\PaymentRequestInput
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param string $paymentOrderKey
     */
    public function setPaymentOrderKey($paymentOrderKey)
    {
        $this->paymentOrderKey = $paymentOrderKey;
    }

    /**
     * @return string
     */
    public function getPaymentOrderKey()
    {
        return $this->paymentOrderKey;
    }
}
