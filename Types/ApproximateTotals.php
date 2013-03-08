<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments ApproximateTotals class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class ApproximateTotals extends BaseObject
{
    /**
     * The initial total amount requested for the order.
     *
     * @var int
     */
    protected $totalRegistered;

    /**
     * The amount for the order that is currently pending with the shopper.
     *
     * @var int
     */
    protected $totalShopperPending;

    /**
     * The amount for the order that is currently pending with an acquirer.
     *
     * @var int
     */
    protected $totalAcquirerPending;

    /**
     * The amount for the order that is currently approved by an acquirer.
     *
     * @var int
     */
    protected $totalAcquirerApproved;

    /**
     * The currently captured total amount for the order.
     *
     * @var int
     */
    protected $totalCaptured;

    /**
     * The currently refunded total amount for the order.
     *
     * @var int
     */
    protected $totalRefunded;

    /**
     * If multiple currencies are included in the totals, then the approximation, for convenience is
     * based on a conversion. This is the currency that is used to convert to.
     *
     * @var string
     */
    protected $exchangedTo;

    /**
     * If multiple currencies are included in the totals, then the approximation, for convenience is based on a
     * conversion. This is the date on which the conversion was performed for the calculation of the totals.
     *
     * @var string
     */
    protected $exchangeRateDate;

    /**
     * @param string $exchangeRateDate
     */
    public function setExchangeRateDate($exchangeRateDate)
    {
        $this->exchangeRateDate = $exchangeRateDate;
    }

    /**
     * @return string
     */
    public function getExchangeRateDate()
    {
        return $this->exchangeRateDate;
    }

    /**
     * @param string $exchangedTo
     */
    public function setExchangedTo($exchangedTo)
    {
        $this->exchangedTo = $exchangedTo;
    }

    /**
     * @return string
     */
    public function getExchangedTo()
    {
        return $this->exchangedTo;
    }

    /**
     * @param int $totalAcquirerApproved
     */
    public function setTotalAcquirerApproved($totalAcquirerApproved)
    {
        $this->totalAcquirerApproved = $totalAcquirerApproved;
    }

    /**
     * @return int
     */
    public function getTotalAcquirerApproved()
    {
        return $this->totalAcquirerApproved;
    }

    /**
     * @param int $totalAcquirerPending
     */
    public function setTotalAcquirerPending($totalAcquirerPending)
    {
        $this->totalAcquirerPending = $totalAcquirerPending;
    }

    /**
     * @return int
     */
    public function getTotalAcquirerPending()
    {
        return $this->totalAcquirerPending;
    }

    /**
     * @param int $totalCaptured
     */
    public function setTotalCaptured($totalCaptured)
    {
        $this->totalCaptured = $totalCaptured;
    }

    /**
     * @return int
     */
    public function getTotalCaptured()
    {
        return $this->totalCaptured;
    }

    /**
     * @param int $totalRefunded
     */
    public function setTotalRefunded($totalRefunded)
    {
        $this->totalRefunded = $totalRefunded;
    }

    /**
     * @return int
     */
    public function getTotalRefunded()
    {
        return $this->totalRefunded;
    }

    /**
     * @param int $totalRegistered
     */
    public function setTotalRegistered($totalRegistered)
    {
        $this->totalRegistered = $totalRegistered;
    }

    /**
     * @return int
     */
    public function getTotalRegistered()
    {
        return $this->totalRegistered;
    }

    /**
     * @param int $totalShopperPending
     */
    public function setTotalShopperPending($totalShopperPending)
    {
        $this->totalShopperPending = $totalShopperPending;
    }

    /**
     * @return int
     */
    public function getTotalShopperPending()
    {
        return $this->totalShopperPending;
    }
}
