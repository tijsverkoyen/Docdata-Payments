<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments PaymentResponse class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class PaymentResponse extends Object
{
    /**
     * @var mixed
     */
    protected $paymentSuccess;

    /**
     * @var mixed
     */
    protected $paymentInsufficientData;

    /**
     * @var mixed
     */
    protected $paymentError;
}
