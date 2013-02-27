<?php

//require
require_once '../../../autoload.php';
require_once 'config.php';

use \TijsVerkoyen\DocDataPayments\DocDataPayments;

// create instance
$docDataPayments = new DocDataPayments(WSDL);
$docDataPayments->setCredentials(USERNAME, PASSWORD);

try {
//    $paymentPreferences = new \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences();
//    $paymentPreferences->profile = 'standard';
//    $paymentPreferences->numberOfDaysToPay = 4;
//
//    $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $shopper = new \TijsVerkoyen\DocDataPayments\Types\Shopper();
//    $shopper->setId(1);
//    $shopper->setGender('M');
//    $shopper->setName($name);
//    $shopper->setEmail('php-docdatapayments@verkoyen.eu');
//    $shopper->setLanguage(new \TijsVerkoyen\DocDataPayments\Types\Language('nl'));
//
//    $totalGrossAmount = new \TijsVerkoyen\DocDataPayments\Types\Amount(2000);
//
//    $address = new \TijsVerkoyen\DocDataPayments\Types\Address();
//    $address->setStreet('Kerkstraat');
//    $address->setHouseNumber(108);
//    $address->setPostalCode('9050');
//    $address->setCity('Gentbrugge');
//    $address->setCountry(new \TijsVerkoyen\DocDataPayments\Types\Country('BE'));
//
//    $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $billTo = new \TijsVerkoyen\DocDataPayments\Types\Destination();
//    $billTo->setName($name);
//    $billTo->setAddress($address);
//
//    $response = $docDataPayments->create(
//        time(),
//        $shopper,
//        $totalGrossAmount,
//        $billTo,
//        $paymentPreferences
//    );
} catch (Exception $e) {
    var_dump($e);
}

// output
var_dump($response);
