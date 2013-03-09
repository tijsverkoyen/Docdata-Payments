<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Language class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Language extends Object
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param null $code
     */
    public function __construct($code = null)
    {
        if ($code !== null) {
            $this->setCode($code);
        }
    }
}
