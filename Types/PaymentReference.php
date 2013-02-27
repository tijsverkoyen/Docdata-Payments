<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments PaymentReference class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class PaymentReference extends BaseObject
{
    /**
     * A linkID token, which is a UUID type 4 (see RFC-4122 and ITU-T Rec. X.667).
     * @var string
     */
    protected $linkId;

    /**
     * @var string
     */
    protected $paymentId;

    /**
     * @param string $linkId
     */
    public function setLinkId($linkId)
    {
        $this->linkId = $linkId;
    }

    /**
     * @return string
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * @param string $paymentId
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }
}
