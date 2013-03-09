<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments SepaBankAccount class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class SepaBankAccount extends Object
{
    /**
     * @var string
     */
    protected $holderName;

    /**
     * @var string
     */
    protected $holderCity;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Country
     */
    protected $holderCountry;

    /**
     * @var string
     */
    protected $bic;

    /**
     * @var string
     */
    protected $iban;

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
     * @param string $holderCity
     */
    public function setHolderCity($holderCity)
    {
        $this->holderCity = $holderCity;
    }

    /**
     * @return string
     */
    public function getHolderCity()
    {
        return $this->holderCity;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Country $holderCountry
     */
    public function setHolderCountry($holderCountry)
    {
        $this->holderCountry = $holderCountry;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Country
     */
    public function getHolderCountry()
    {
        return $this->holderCountry;
    }

    /**
     * @param string $holderName
     */
    public function setHolderName($holderName)
    {
        $this->holderName = $holderName;
    }

    /**
     * @return string
     */
    public function getHolderName()
    {
        return $this->holderName;
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
