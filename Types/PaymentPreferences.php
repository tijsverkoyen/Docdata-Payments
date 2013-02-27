<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments PaymentPreferences class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class PaymentPreferences extends BaseObject
{
    /**
     * @var string
     */
    protected $profile;

    /**
     * @var int
     */
    protected $numberOfDaysToPay;

    /**
     * @param int $numberOfDaysToPay
     */
    public function setNumberOfDaysToPay($numberOfDaysToPay)
    {
        $this->numberOfDaysToPay = $numberOfDaysToPay;
    }

    /**
     * @return int
     */
    public function getNumberOfDaysToPay()
    {
        return $this->numberOfDaysToPay;
    }

    /**
     * @param string $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
