<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Invoice class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Vat extends BaseObject
{
    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    protected $amount;

    /**
     * @var float
     */
    protected $rate;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Amount $amount
     */
    public function setAmount(Amount $amount)
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
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }
}
