<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments GiftCardPaymentInfo class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class GiftCardPaymentInfo extends Object
{
    /**
     * @var string
     */
    protected $giftCardNumber;

    /**
     * @var string
     */
    protected $balance;

    /**
     * @param string $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param string $giftCardNumber
     */
    public function setGiftCardNumber($giftCardNumber)
    {
        $this->giftCardNumber = $giftCardNumber;
    }

    /**
     * @return string
     */
    public function getGiftCardNumber()
    {
        return $this->giftCardNumber;
    }
}
