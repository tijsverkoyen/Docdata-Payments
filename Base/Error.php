<?php
namespace TijsVerkoyen\DocDataPayments\Base;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Error class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Error extends Object
{
    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Error
     */
    protected $error;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Error $error
     */
    public function setError(Error $error)
    {
        $this->error = $error;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Error
     */
    public function getError()
    {
        return $this->error;
    }
}
