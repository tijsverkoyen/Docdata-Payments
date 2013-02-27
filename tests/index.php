<?php

//require
require_once '../../../autoload.php';
require_once 'config.php';

use \TijsVerkoyen\DocDataPayments\DocDataPayments;

// create instance
$docDataPayments = new DocDataPayments(WSDL);

try {
} catch (Exception $e) {
	var_dump($e);
}

// output
var_dump($response);
