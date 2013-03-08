<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments CancelRequest class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class CancelRequest extends BaseObject
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
     * @var string
     */
    protected $version = '0.9';

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
