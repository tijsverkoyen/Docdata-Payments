<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Quantity class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Quantity extends Object
{
    /**
     * @var int
     */
    private $_;

    /**
     * @var string
     */
    private $unitOfMeasure = 'PCS';

    /**
     * @param string $unitOfMeasure
     */
    public function setUnitOfMeasure($unitOfMeasure)
    {
        $this->unitOfMeasure = $unitOfMeasure;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasure()
    {
        return $this->unitOfMeasure;
    }

    /**
     * @param int $number
     */
    public function __construct($number)
    {
        $this->_ = $number;
    }

    /**
     * Convert the object into an array
     * @return array
     */
    public function toArray()
    {
        return array(
            '_' => $this->_,
            'unitOfMeasure' => $this->getUnitOfMeasure()
        );
    }
}
