<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments StatusRequest class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class StatusSuccess extends BaseObject
{
    /**
     * @var Report
     */
    protected $report;

    /**
     * @var Success
     */
    protected $success;

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Report $report
     */
    public function setReport($report)
    {
        $this->report = $report;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Report
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Success $success
     */
    public function setSuccess(Success $success)
    {
        $this->success = $success;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Success
     */
    public function getSuccess()
    {
        return $this->success;
    }
}
