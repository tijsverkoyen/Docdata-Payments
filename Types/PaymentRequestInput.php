<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments PaymentRequestInput class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class PaymentRequestInput extends BaseObject
{
    /**
     * Payment method to be used.
     *
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    protected $paymentAmount;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\AmexPaymentInput
     */
    protected $amexPaymentInput;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInput
     */
    protected $masterCardPaymentInput;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\VisaPaymentInput
     */
    protected $visaPaymentInput;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\DirectDebitPaymentInput
     */
    protected $directDebitPaymentInput;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\BankTransferPaymentInput
     */
    protected $bankTransferPaymentInput;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\elvPaymentInput
     */
    protected $elvPaymentInput;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\AmexPaymentInput $amexPaymentInput
     */
    public function setAmexPaymentInput($amexPaymentInput)
    {
        $this->amexPaymentInput = $amexPaymentInput;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\AmexPaymentInput
     */
    public function getAmexPaymentInput()
    {
        return $this->amexPaymentInput;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\BankTransferPaymentInput $bankTransferPaymentInput
     */
    public function setBankTransferPaymentInput($bankTransferPaymentInput)
    {
        $this->bankTransferPaymentInput = $bankTransferPaymentInput;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\BankTransferPaymentInput
     */
    public function getBankTransferPaymentInput()
    {
        return $this->bankTransferPaymentInput;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\DirectDebitPaymentInput $directDebitPaymentInput
     */
    public function setDirectDebitPaymentInput($directDebitPaymentInput)
    {
        $this->directDebitPaymentInput = $directDebitPaymentInput;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\DirectDebitPaymentInput
     */
    public function getDirectDebitPaymentInput()
    {
        return $this->directDebitPaymentInput;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\elvPaymentInput $elvPaymentInput
     */
    public function setElvPaymentInput($elvPaymentInput)
    {
        $this->elvPaymentInput = $elvPaymentInput;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\elvPaymentInput
     */
    public function getElvPaymentInput()
    {
        return $this->elvPaymentInput;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInput $masterCardPaymentInput
     */
    public function setMasterCardPaymentInput($masterCardPaymentInput)
    {
        $this->masterCardPaymentInput = $masterCardPaymentInput;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInput
     */
    public function getMasterCardPaymentInput()
    {
        return $this->masterCardPaymentInput;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Amount $paymentAmount
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\VisaPaymentInput $visaPaymentInput
     */
    public function setVisaPaymentInput($visaPaymentInput)
    {
        $this->visaPaymentInput = $visaPaymentInput;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\VisaPaymentInput
     */
    public function getVisaPaymentInput()
    {
        return $this->visaPaymentInput;
    }
}
