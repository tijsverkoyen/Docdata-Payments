<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\RequestSuccess;

/**
 * DocDataPayments StatusRequest class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class StatusSuccess extends RequestSuccess
{
    /**
     * @var \TijsVerkoyen\DocDataPayments\Types\Report
     */
    protected $report;

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
}
