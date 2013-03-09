<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\SuccessError;

/**
 * DocDataPayments Success class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Success extends SuccessError
{
    /**
     * @var array
     */
    protected $explanations = array(
        'SUCCESS' => 'The operation was generally successful.',
    );
}
