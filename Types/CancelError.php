<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments CancelError class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class CancelError extends BaseObject
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
