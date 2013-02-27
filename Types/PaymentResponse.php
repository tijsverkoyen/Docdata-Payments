<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments PaymentResponse class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class PaymentResponse extends BaseObject
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
