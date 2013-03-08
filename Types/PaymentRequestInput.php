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
     * @var string
     */
    protected $clientHolderAccountNr;

    /**
     * @var string
     */
    protected $clientHolderLastName;

    /**
     * @var string
     */
    protected $clientHolderLastNameAdd;

    /**
     * @var string
     */
    protected $clientHolderFirstName;

    /**
     * @var string
     */
    protected $clientHolderInitials;

    /**
     * @var string
     */
    protected $clientHolderFullName;

    /**
     * @var string
     */
    protected $clientHolderCity;

    /**
     * @var string
     */
    protected $clientHolderBankCountry;

    /**
     * @var string
     */
    protected $clientCompany;

    /**
     * @var string
     */
    protected $creditCardcvc2;

    /**
     * @var string
     */
    protected $creditCardExpireDate;

    /**
     * @var string
     */
    protected $creditCardNr;

    /**
     * @param string $clientCompany
     */
    public function setClientCompany($clientCompany)
    {
        $this->clientCompany = $clientCompany;
    }

    /**
     * @return string
     */
    public function getClientCompany()
    {
        return $this->clientCompany;
    }

    /**
     * @param string $clientHolderAccountNr
     */
    public function setClientHolderAccountNr($clientHolderAccountNr)
    {
        $this->clientHolderAccountNr = $clientHolderAccountNr;
    }

    /**
     * @return string
     */
    public function getClientHolderAccountNr()
    {
        return $this->clientHolderAccountNr;
    }

    /**
     * @param string $clientHolderBankCountry
     */
    public function setClientHolderBankCountry($clientHolderBankCountry)
    {
        $this->clientHolderBankCountry = $clientHolderBankCountry;
    }

    /**
     * @return string
     */
    public function getClientHolderBankCountry()
    {
        return $this->clientHolderBankCountry;
    }

    /**
     * @param string $clientHolderCity
     */
    public function setClientHolderCity($clientHolderCity)
    {
        $this->clientHolderCity = $clientHolderCity;
    }

    /**
     * @return string
     */
    public function getClientHolderCity()
    {
        return $this->clientHolderCity;
    }

    /**
     * @param string $clientHolderFirstName
     */
    public function setClientHolderFirstName($clientHolderFirstName)
    {
        $this->clientHolderFirstName = $clientHolderFirstName;
    }

    /**
     * @return string
     */
    public function getClientHolderFirstName()
    {
        return $this->clientHolderFirstName;
    }

    /**
     * @param string $clientHolderFullName
     */
    public function setClientHolderFullName($clientHolderFullName)
    {
        $this->clientHolderFullName = $clientHolderFullName;
    }

    /**
     * @return string
     */
    public function getClientHolderFullName()
    {
        return $this->clientHolderFullName;
    }

    /**
     * @param string $clientHolderInitials
     */
    public function setClientHolderInitials($clientHolderInitials)
    {
        $this->clientHolderInitials = $clientHolderInitials;
    }

    /**
     * @return string
     */
    public function getClientHolderInitials()
    {
        return $this->clientHolderInitials;
    }

    /**
     * @param string $clientHolderLastName
     */
    public function setClientHolderLastName($clientHolderLastName)
    {
        $this->clientHolderLastName = $clientHolderLastName;
    }

    /**
     * @return string
     */
    public function getClientHolderLastName()
    {
        return $this->clientHolderLastName;
    }

    /**
     * @param string $clientHolderLastNameAdd
     */
    public function setClientHolderLastNameAdd($clientHolderLastNameAdd)
    {
        $this->clientHolderLastNameAdd = $clientHolderLastNameAdd;
    }

    /**
     * @return string
     */
    public function getClientHolderLastNameAdd()
    {
        return $this->clientHolderLastNameAdd;
    }

    /**
     * @param string $creditCardExpireDate
     */
    public function setCreditCardExpireDate($creditCardExpireDate)
    {
        $this->creditCardExpireDate = $creditCardExpireDate;
    }

    /**
     * @return string
     */
    public function getCreditCardExpireDate()
    {
        return $this->creditCardExpireDate;
    }

    /**
     * @param string $creditCardNr
     */
    public function setCreditCardNr($creditCardNr)
    {
        $this->creditCardNr = $creditCardNr;
    }

    /**
     * @return string
     */
    public function getCreditCardNr()
    {
        return $this->creditCardNr;
    }

    /**
     * @param string $creditCardcvc2
     */
    public function setCreditCardcvc2($creditCardcvc2)
    {
        $this->creditCardcvc2 = $creditCardcvc2;
    }

    /**
     * @return string
     */
    public function getCreditCardcvc2()
    {
        return $this->creditCardcvc2;
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
     * @param string $paymentMethod Possible values are: AMEX, MASTERCARD, VISA, DIRECT_DEBIT, BANK_TRANSFER, ELV
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
}
