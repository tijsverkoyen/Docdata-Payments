<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments PaymentInfo class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class PaymentInfo extends Object
{
    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\RiskCheck
     */
    protected $riskChecks;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\AmexPaymentInfo
     */
    protected $amexPaymentInfo;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInfo
     */
    protected $masterCardPaymentInfo;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\VisaPaymentInfo
     */
    protected $visaPaymentInfo;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\BankTransferPaymentInfo
     */
    protected $bankTransferPaymentInfo;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\MaestroPaymentInfo
     */
    protected $maestroPaymentInfo;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInfo
     */
    protected $misterCashPaymentInfo;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\GiftCardPaymentInfo
     */
    protected $giftCardPaymentInfo;

    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\IDealPaymentInfo
     */
    protected $iDealPaymentInfo;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\AmexPaymentInfo $amexPaymentInfo
     */
    public function setAmexPaymentInfo($amexPaymentInfo)
    {
        $this->amexPaymentInfo = $amexPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\AmexPaymentInfo
     */
    public function getAmexPaymentInfo()
    {
        return $this->amexPaymentInfo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\BankTransferPaymentInfo $bankTransferPaymentInfo
     */
    public function setBankTransferPaymentInfo($bankTransferPaymentInfo)
    {
        $this->bankTransferPaymentInfo = $bankTransferPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\BankTransferPaymentInfo
     */
    public function getBankTransferPaymentInfo()
    {
        return $this->bankTransferPaymentInfo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\GiftCardPaymentInfo $giftCardPaymentInfo
     */
    public function setGiftCardPaymentInfo($giftCardPaymentInfo)
    {
        $this->giftCardPaymentInfo = $giftCardPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\GiftCardPaymentInfo
     */
    public function getGiftCardPaymentInfo()
    {
        return $this->giftCardPaymentInfo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\IDealPaymentInfo $iDealPaymentInfo
     */
    public function setIDealPaymentInfo($iDealPaymentInfo)
    {
        $this->iDealPaymentInfo = $iDealPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\IDealPaymentInfo
     */
    public function getIDealPaymentInfo()
    {
        return $this->iDealPaymentInfo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\MaestroPaymentInfo $maestroPaymentInfo
     */
    public function setMaestroPaymentInfo($maestroPaymentInfo)
    {
        $this->maestroPaymentInfo = $maestroPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\MaestroPaymentInfo
     */
    public function getMaestroPaymentInfo()
    {
        return $this->maestroPaymentInfo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInfo $masterCardPaymentInfo
     */
    public function setMasterCardPaymentInfo($masterCardPaymentInfo)
    {
        $this->masterCardPaymentInfo = $masterCardPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInfo
     */
    public function getMasterCardPaymentInfo()
    {
        return $this->masterCardPaymentInfo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInfo $misterCashPaymentInfo
     */
    public function setMisterCashPaymentInfo($misterCashPaymentInfo)
    {
        $this->misterCashPaymentInfo = $misterCashPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\MasterCardPaymentInfo
     */
    public function getMisterCashPaymentInfo()
    {
        return $this->misterCashPaymentInfo;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\RiskCheck $riskChecks
     */
    public function setRiskChecks($riskChecks)
    {
        $this->riskChecks = $riskChecks;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\RiskCheck
     */
    public function getRiskChecks()
    {
        return $this->riskChecks;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\VisaPaymentInfo $visaPaymentInfo
     */
    public function setVisaPaymentInfo($visaPaymentInfo)
    {
        $this->visaPaymentInfo = $visaPaymentInfo;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\VisaPaymentInfo
     */
    public function getVisaPaymentInfo()
    {
        return $this->visaPaymentInfo;
    }
}
