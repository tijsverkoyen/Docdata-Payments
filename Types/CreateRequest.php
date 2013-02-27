<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments CreateRequest class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class CreateRequest extends BaseObject
{
    /**
     * Merchant credentials.
     *
     * @var Merchant
     */
    protected $merchant;

    /**
     * Unique merchant reference to this order.
     *
     * @var string
     */
    protected $merchantOrderReference;

    /**
     * Preferences to use for this payment.
     *
     * @var PaymentPreferences
     */
    protected $paymentPreferences;

    /**
     * Preferences to be used for the webmenu.
     *
     * @var MenuPreferences
     */
    protected $menuPreferences;

    /**
     * Information concerning the shopper who placed
     *
     * @var Shopper
     */
    protected $shopper;

    /**
     * Total order gross amount.
     *
     * @var Amount
     */
    protected $totalGrossAmount;

    /**
     * Name and address to use for billing.
     *
     * @var Destination
     */
    protected $billTo;

    /**
     * The description of the order.
     *
     * @var string
     */
    protected $description;

    /**
     * The description that is used by payment providers on shopper statements.
     *
     * @var string
     */
    protected $receiptText;

    /**
     * Indicates if the cost of the chosen payment method should be added
     * (true) or should not be added (false) to the order amount. Default is
     * false. Note that this will not work for every payment method. In the
     * future, DocData may no longer support this feature.
     *
     * @var bool
     */
    protected $includeCosts = false;

    /**
     * Optionally specifies a request. When it targets an existing previous
     * payment, then that will be used to start a new payment with directly.
     * If it does not point to a payment, then reservations are made as the
     * starting point for upcoming repeated payments. Using "start" with the
     * request instead is highly recommended.
     *
     * @var PaymentRequest
     */
    protected $paymentRequest;

    /**
     * @var Invoice
     */
    protected $invoice;

    /**
     * @var string
     */
    protected $version = '0.9';

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Destination $billTo
     */
    public function setBillTo($billTo)
    {
        $this->billTo = $billTo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Destination
     */
    public function getBillTo()
    {
        return $this->billTo;
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
     * @param boolean $includeCosts
     */
    public function setIncludeCosts($includeCosts)
    {
        $this->includeCosts = $includeCosts;
    }

    /**
     * @return boolean
     */
    public function getIncludeCosts()
    {
        return $this->includeCosts;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Invoice $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\MenuPreferences $menuPreferences
     */
    public function setMenuPreferences($menuPreferences)
    {
        $this->menuPreferences = $menuPreferences;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\MenuPreferences
     */
    public function getMenuPreferences()
    {
        return $this->menuPreferences;
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
     * @param string $merchantOrderReference
     */
    public function setMerchantOrderReference($merchantOrderReference)
    {
        $this->merchantOrderReference = $merchantOrderReference;
    }

    /**
     * @return string
     */
    public function getMerchantOrderReference()
    {
        return $this->merchantOrderReference;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences $paymentPreferences
     */
    public function setPaymentPreferences($paymentPreferences)
    {
        $this->paymentPreferences = $paymentPreferences;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences
     */
    public function getPaymentPreferences()
    {
        return $this->paymentPreferences;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\PaymentRequest $paymentRequest
     */
    public function setPaymentRequest($paymentRequest)
    {
        $this->paymentRequest = $paymentRequest;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\PaymentRequest
     */
    public function getPaymentRequest()
    {
        return $this->paymentRequest;
    }

    /**
     * @param string $receiptText
     */
    public function setReceiptText($receiptText)
    {
        $this->receiptText = $receiptText;
    }

    /**
     * @return string
     */
    public function getReceiptText()
    {
        return $this->receiptText;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Shopper $shopper
     */
    public function setShopper($shopper)
    {
        $this->shopper = $shopper;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Shopper
     */
    public function getShopper()
    {
        return $this->shopper;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Amount $totalGrossAmount
     */
    public function setTotalGrossAmount($totalGrossAmount)
    {
        $this->totalGrossAmount = $totalGrossAmount;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    public function getTotalGrossAmount()
    {
        return $this->totalGrossAmount;
    }
}
