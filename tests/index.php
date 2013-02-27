<?php

//require
require_once '../../../autoload.php';
require_once 'config.php';

use \TijsVerkoyen\DocDataPayments\DocDataPayment;

// create instance
$dbFact = new DocDataPayments();

try {
} catch (Exception $e) {
	var_dump($e);
}

// output
var_dump($response);
