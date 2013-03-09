<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments IDealPaymentInfo class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class IDealPaymentInfo extends Object
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
