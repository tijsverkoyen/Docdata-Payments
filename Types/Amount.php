<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Country class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Amount extends BaseObject
{
    /**
     * @var int
     */
    private $_;

    /**
     * @var string
     */
    private $currency = 'EUR';

    /**
     * @param int $number
     */
    public function __construct($number)
    {
        $this->_ = $number;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
