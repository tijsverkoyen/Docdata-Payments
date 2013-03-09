<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\SuccessError;

/**
 * DocDataPayments Error class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Error extends SuccessError
{
    /**
     * @var array
     */
    protected $explanations = array(
        'UNKNOWN_ERROR' => 'The reason of error is unknown.',
        'REQUEST_DATA_MISSING' => 'Request data is missing.',
        'REQUEST_DATA_INCORRECT' => 'Request data is incorrect.',
        'SECURITY_ERROR' => 'Error related to security violations such as login failure or not allowed IP.',
        'INTERNAL_ERROR' => 'Payment system error.',
    );
}
