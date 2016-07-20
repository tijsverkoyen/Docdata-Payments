<?php
namespace TijsVerkoyen\DocDataPayments\Base;
interface LogInterface
{
    public function info($message, $data = null);

    public function warning($message, $data = null);

    public function error($message, $data = null);

    public function getLog();
}
