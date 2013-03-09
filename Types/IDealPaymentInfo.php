<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments IDealPaymentInfo class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class IDealPaymentInfo extends BaseObject
{
    /**
     * @var string
     */
    protected $issuerId;

    /**
     * @param string $issuerId
     */
    public function setIssuerId($issuerId)
    {
        $this->issuerId = $issuerId;
    }

    /**
     * @return string
     */
    public function getIssuerId()
    {
        return $this->issuerId;
    }
}
