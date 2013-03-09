<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Country class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Amount extends Object
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

    /**
     * Convert the object into an array
     * @return array
     */
    public function toArray()
    {
        return array(
            '_' => $this->_,
            'currency' => $this->getCurrency()
        );
    }
}
