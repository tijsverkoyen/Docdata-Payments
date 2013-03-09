<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments BankTransferPaymentInfo class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class BankTransferPaymentInfo extends Object
{
    /**
     * @var string
     */
    protected $beneficiaryName;

    /**
     * @var string
     */
    protected $beneficiaryCity;

    /**
     * @var string
     */
    protected $beneficiaryCountry;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * @var string
     */
    protected $bankCity;

    /**
     * @var string
     */
    protected $bic;

    /**
     * @var string
     */
    protected $iban;

    /**
     * @param string $bankCity
     */
    public function setBankCity($bankCity)
    {
        $this->bankCity = $bankCity;
    }

    /**
     * @return string
     */
    public function getBankCity()
    {
        return $this->bankCity;
    }

    /**
     * @param string $bankName
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param string $beneficiaryCity
     */
    public function setBeneficiaryCity($beneficiaryCity)
    {
        $this->beneficiaryCity = $beneficiaryCity;
    }

    /**
     * @return string
     */
    public function getBeneficiaryCity()
    {
        return $this->beneficiaryCity;
    }

    /**
     * @param string $beneficiaryCountry
     */
    public function setBeneficiaryCountry($beneficiaryCountry)
    {
        $this->beneficiaryCountry = $beneficiaryCountry;
    }

    /**
     * @return string
     */
    public function getBeneficiaryCountry()
    {
        return $this->beneficiaryCountry;
    }

    /**
     * @param string $beneficiaryName
     */
    public function setBeneficiaryName($beneficiaryName)
    {
        $this->beneficiaryName = $beneficiaryName;
    }

    /**
     * @return string
     */
    public function getBeneficiaryName()
    {
        return $this->beneficiaryName;
    }

    /**
     * @param string $bic
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }
}
