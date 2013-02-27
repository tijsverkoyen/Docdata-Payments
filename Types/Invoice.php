<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Invoice class
 *
 * @author  Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Invoice extends BaseObject
{
    /**
     * Total net amount for this order.
     * @var Amount
     */
    protected $totalNetAmount;

    /**
     * Total VAT amount for this order.
     * @var Vat
     */
    protected $totalVatAmount;

    /**
     * Information concerning the ordered items.
     * @var array
     */
    protected $item = array();

    /**
     * Name and address to use for shipping.
     * @var Destination
     */
    protected $shipTo;

    /**
     * Additional description concerning the payment order.
     * @var string
     */
    protected $additionalDescription;

    /**
     * @param string $additionalDescription
     */
    public function setAdditionalDescription($additionalDescription)
    {
        $this->additionalDescription = $additionalDescription;
    }

    /**
     * @return string
     */
    public function getAdditionalDescription()
    {
        return $this->additionalDescription;
    }

    /**
     * @param array $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return array
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Destination $shipTo
     */
    public function setShipTo(Destination $shipTo)
    {
        $this->shipTo = $shipTo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Destination
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Amount $totalNetAmount
     */
    public function setTotalNetAmount(Amount $totalNetAmount)
    {
        $this->totalNetAmount = $totalNetAmount;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Amount
     */
    public function getTotalNetAmount()
    {
        return $this->totalNetAmount;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Vat $totalVatAmount
     */
    public function setTotalVatAmount(Vat $totalVatAmount)
    {
        $this->totalVatAmount = $totalVatAmount;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Vat
     */
    public function getTotalVatAmount()
    {
        return $this->totalVatAmount;
    }
}
