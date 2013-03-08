<?php

//require
require_once '../../../autoload.php';
require_once 'config.php';

use \TijsVerkoyen\DocDataPayments\DocDataPayments;
use \TijsVerkoyen\DocDataPayments\Types\Address;
use \TijsVerkoyen\DocDataPayments\Types\Amount;
use \TijsVerkoyen\DocDataPayments\Types\Country;
use \TijsVerkoyen\DocDataPayments\Types\Destination;
use \TijsVerkoyen\DocDataPayments\Types\Invoice;
use \TijsVerkoyen\DocDataPayments\Types\Item;
use \TijsVerkoyen\DocDataPayments\Types\Language;
use \TijsVerkoyen\DocDataPayments\Types\MenuPreferences;
use \TijsVerkoyen\DocDataPayments\Types\Name;
use \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences;
use \TijsVerkoyen\DocDataPayments\Types\PaymentReference;
use \TijsVerkoyen\DocDataPayments\Types\PaymentRequest;
use \TijsVerkoyen\DocDataPayments\Types\Quantity;
use \TijsVerkoyen\DocDataPayments\Types\Shopper;
use \TijsVerkoyen\DocDataPayments\Types\Vat;

// create instance
$docDataPayments = new DocDataPayments(WSDL);
$docDataPayments->setCredentials(USERNAME, PASSWORD);

try {
    // simple start of payment
//    $name = new Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $shopper = new Shopper();
//    $shopper->setId(1);
//    $shopper->setGender('M');
//    $shopper->setName($name);
//    $shopper->setEmail('php-docdatapayments@verkoyen.eu');
//    $shopper->setLanguage(new Language('nl'));
//
//    $totalGrossAmount = new Amount(2000);
//
//    $address = new Address();
//    $address->setStreet('Kerkstraat');
//    $address->setHouseNumber(108);
//    $address->setPostalCode('9050');
//    $address->setCity('Gentbrugge');
//    $address->setCountry(new Country('BE'));
//
//    $name = new Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $billTo = new Destination();
//    $billTo->setName($name);
//    $billTo->setAddress($address);
//
//    $paymentPreferences = new PaymentPreferences();
//    $paymentPreferences->setProfile('standard');
//    $paymentPreferences->setNumberOfDaysToPay(4);
//
//    $response = $docDataPayments->create(
//        time(),
//        $shopper,
//        $totalGrossAmount,
//        $billTo,
//        $paymentPreferences
//    );

    // extended start of payment, untested
//    $name = new Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $shopper = new Shopper();
//    $shopper->setId(1);
//    $shopper->setGender('M');
//    $shopper->setName($name);
//    $shopper->setEmail('php-docdatapayments@verkoyen.eu');
//    $shopper->setLanguage(new Language('nl'));
//
//    $totalGrossAmount = new Amount(2000);
//
//    $address = new Address();
//    $address->setStreet('Kerkstraat');
//    $address->setHouseNumber(108);
//    $address->setPostalCode('9050');
//    $address->setCity('Gentbrugge');
//    $address->setCountry(new Country('BE'));
//
//    $name = new Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $billTo = new Destination();
//    $billTo->setName($name);
//    $billTo->setAddress($address);
//
//    $paymentPreferences = new PaymentPreferences();
//    $paymentPreferences->setProfile('standard');
//    $paymentPreferences->setNumberOfDaysToPay(4);
//
//    $menuPreferences = new MenuPreferences();
//
//    $paymentRequest = null;
//    // $paymentReference = new PaymentReference();
//    // $paymentReference->setLinkId(1);
//    // $paymentRequest = new PaymentRequest();
//    // $paymentRequest->setPaymentReference($paymentReference);
//
//    $vat = new Vat();
//    $vat->setAmount(new Amount(21));
//    $vat->setRate(21);
//    $item = new Item(
//        12345,
//        '12345',
//        'Test product',
//        new Quantity(1),
//        'Dit is een test product',
//        new Amount(1000),
//        new Amount(1000),
//        $vat
//    );
//    $vat = new Vat();
//    $vat->setAmount(new Amount(190));
//    $vat->setRate(19);
//
//    $items = array($item);
//
//    $address = new Address();
//    $address->setStreet('Kerkstraat');
//    $address->setHouseNumber(108);
//    $address->setPostalCode('9050');
//    $address->setCity('Gentbrugge');
//    $address->setCountry(new Country('BE'));
//
//    $name = new Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $shipTo = new Destination();
//    $shipTo->setName($name);
//    $shipTo->setAddress($address);
//
//    $vat = new Vat();
//    $vat->setAmount(new Amount(210));
//    $vat->setRate(21);
//
//    $invoice = new Invoice();
//    $invoice->setItem($items);
//    $invoice->setShipTo($shipTo);
//    $invoice->setTotalNetAmount(new Amount(1000));
//    $invoice->setTotalVatAmount($vat);
//
//    $response = $docDataPayments->create(
//        time(),
//        $shopper,
//        $totalGrossAmount,
//        $billTo,
//        $paymentPreferences,
//        'Description',
//        'ReceiptText',
//        $menuPreferences,
//        $paymentRequest,
//        $invoice,
//        true
//    );

    // status
//    $name = new Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $shopper = new Shopper();
//    $shopper->setId(1);
//    $shopper->setGender('M');
//    $shopper->setName($name);
//    $shopper->setEmail('php-docdatapayments@verkoyen.eu');
//    $shopper->setLanguage(new Language('nl'));
//
//    $totalGrossAmount = new Amount(2000);
//
//    $address = new Address();
//    $address->setStreet('Kerkstraat');
//    $address->setHouseNumber(108);
//    $address->setPostalCode('9050');
//    $address->setCity('Gentbrugge');
//    $address->setCountry(new Country('BE'));
//
//    $name = new Name();
//    $name->setFirst('Tijs');
//    $name->setLast('Verkoyen');
//
//    $billTo = new Destination();
//    $billTo->setName($name);
//    $billTo->setAddress($address);
//
//    $paymentPreferences = new PaymentPreferences();
//    $paymentPreferences->setProfile('standard');
//    $paymentPreferences->setNumberOfDaysToPay(4);
//
//    $response = $docDataPayments->create(
//        time(),
//        $shopper,
//        $totalGrossAmount,
//        $billTo,
//        $paymentPreferences
//    );
//
//    $response = $docDataPayments->status($response->getKey());
} catch (Exception $e) {
    var_dump($e);
}

// output
var_dump($response);
