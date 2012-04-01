<?php

// require
require_once 'config.php';
require_once '../docdata_payments.php';

// create instance
$docdatapayments = new DocdataPayments(USERNAME, PASSWORD);

$name = new DocdataPaymentsName('Tijs', 'Verkoyen');
$address = new DocdataPaymentsAddress('Kalestraat', '15', '9940', 'Evergem', 'BE');

// $order = new DocdataPaymentsSimpleOrder();
// $order->setPaymentPreferences('standard', 8);
// $order->setShopper('id', $name, 'tijs@verkoyen.eu', 'nl');
// $order->setTotalGrossAmount(100);
// $order->setMerchantOrderReference(time());
// $order->setBillTo($name, $address);
// $response = $docdatapayments->simplePaymentOrder($order);
$order = new DocdataPaymentsOrder();
$order->setPaymentPreferences('standard', 8);
$order->setShopper('id', $name, 'tijs@verkoyen.eu', 'nl');
$order->setTotalGrossAmount(72.6);
$order->setTotalNetAmount(60);
$order->setTotalVatAmount(12.6, 21);
$order->setMerchantOrderReference(time());
$order->setBillTo($name, $address);
$order->setShipTo($name, $address);

$order->addItem('Tijs', 'Z-1', 2, 'description', 10, 12.1, 2.1, 21, 'BE');
$order->addItem('Jan', 'Z-2', 2, 'description', 10, 12.1, 2.1, 21, 'BE');
$order->addItem('Jens', 'Z-3', 2, 'description', 10, 12.1, 2.1, 21, 'BE');

$response = $docdatapayments->paymentOrder($order);
// $response = $docdatapayments->getPaymentUrl('nl', $response, $successUrl = 'http://www.google.com?id=');
// $response = $docdatapayments->redirectToPaymentUrl('nl', $response, $successUrl = 'http://www.google.com?id=');
// $response = $docdatapayments->getPaymentStatus('7A6AB5DA539457F7FB7247688E0B12CF');
// $response = $docdatapayments->cancelPayment('7EFE067B3931A2B78EDD4A2628036F7B');
// $response = $docdatapayments->refundPayment('7A6AB5DA539457F7FB7247688E0B12CF', '4905136240', 10);
// $response = $docdatapayments->requestPaymentClusterInfo(1333224804);

Spoon::dump($response);


// transaction id = 1333224804
// payment_cluster_key=7A6AB5DA539457F7FB7247688E0B12CF&return_url_success=http%3A%2F%2Fwww.google.com%3Fid%3D"



// output (Spoon::dump())
ob_start();
var_dump($response);
$output = ob_get_clean();

// cleanup the output
$output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);

// print
echo '<pre>' . htmlspecialchars($output, ENT_QUOTES, 'UTF-8') . '</pre>';

?>