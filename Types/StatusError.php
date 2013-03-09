<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments StatusError class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class StatusError extends Object
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
