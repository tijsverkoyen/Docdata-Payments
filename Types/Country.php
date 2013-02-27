<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Country class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Country extends BaseObject
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
     * @param string[optional] $code
     */
    public function __construct($code = null)
    {
        if ($code !== null) {
            $this->setCode($code);
        }
    }
}
