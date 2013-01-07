<?php

/**
 * Docdata Payments class
 *
 * This source file can be used to communicate with Docdata Payments (http://www.docdatapayments.com)
 *
 * The class is documented in the file itself. If you find any bugs help me out and report them. Reporting can be done by sending an email to php-docdatapayments-bugs[at]verkoyen[dot]eu.
 * If you report a bug, make sure you give me enough information (include your code).
 *
 * License
 * Copyright (c) Tijs Verkoyen. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
 * 3. The name of the author may not be used to endorse or promote products derived from this software without specific prior written permission.
 *
 * This software is provided by the author "as is" and any express or implied warranties, including, but not limited to, the implied warranties of merchantability and fitness for a particular purpose are disclaimed. In no event shall the author be liable for any direct, indirect, incidental, special, exemplary, or consequential damages (including, but not limited to, procurement of substitute goods or services; loss of use, data, or profits; or business interruption) however caused and on any theory of liability, whether in contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of this software, even if advised of the possibility of such damage.
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 * @version 1.0.0
 * @copyright Copyright (c) Tijs Verkoyen. All rights reserved.
 * @license BSD License
 */
class DocdataPayments
{
	// internal constant to enable/disable debugging
	const DEBUG = false;

	// current version
	const VERSION = '1.0.0';

	/**
	 * The mode
	 *
	 * @var string
	 */
	private $mode = 'test';

	/**
	 * The password
	 *
	 * @var string
	 */
	private $password;

	/**
	 * The SOAP-client
	 *
	 * @var SoapClient
	 */
	private $soapClient;

	/**
	 * The timeout
	 *
	 * @var int
	 */
	private $timeOut = 30;

	/**
	 * The user agent
	 *
	 * @var string
	 */
	private $userAgent;

	/**
	 * The username
	 *
	 * @var string
	 */
	private $username;

	// class methods
	/**
	 * Default constructor
	 *
	 * @param $username string username to authenticate with.
	 * @param $password string password to use for authenticating.
	 */
	public function __construct($username, $password)
	{
		// set some properties
		$this->setUsername($username);
		$this->setPassword($password);
	}

	/**
	 * Destructor
	 */
	public function __destruct()
	{
		if($this->soapClient !== null) $this->soapClient = null;
	}

	/**
	 * Make the call
	 *
	 * @return mixed
	 * @param $method string method to be called.
	 * @param $parameters array[optional] parameters.
	 */
	private function doCall($method, array $parameters = null)
	{
		// open connection if needed
		if($this->soapClient === null)
		{
			// build options
			$options = array('soap_version' => SOAP_1_1, 'trace' => self::DEBUG, 'exceptions' => true, 'connection_timeout' => $this->getTimeOut(), 'user_agent' => $this->getUserAgent());

			// create client
			$this->soapClient = new SoapClient($this->getWSDL(), $options);
		}

		// redefine
		$method = (string) $method;
		$parameters = (array) $parameters;

		// loop parameters
		foreach($parameters as $key => $value)
		{
			// strings should be UTF8
			if(gettype($value) == 'string') $parameters[$key] = utf8_encode($value);
		}

		try
		{
			// make the call
			$response = $this->soapClient->__soapCall($method, array($parameters));
		}

		catch(Exception $e)
		{
			// init var
			$message = $e->getMessage();

			// internal debugging enabled
			if(self::DEBUG)
			{
				echo '<pre>';
				var_dump(htmlentities($this->soapClient->__getLastRequest()));
				var_dump($this);
				echo '</pre>';
			}

			// throw exception
			throw new DocdataPaymentsException($message);
		}

		// validate response
		if(is_soap_fault($response))
		{
			// internal debugging enabled
			if(self::DEBUG)
			{
				echo '<pre>';
				var_dump(htmlentities($this->soapClient->__getLastRequest()));
				var_dump($this);
				echo '</pre>';
			}

			// throw exception
			throw new DocdataPaymentsException($message);
		}

		// return the response
		return $response;
	}

	/**
	 * Make a REST call
	 *
	 * @return SimpleXMLElement
	 * @param $url string URL to call.
	 */
	private function doRestCall($url)
	{
		// set options
		$options[CURLOPT_URL] = (string) $url;
		$options[CURLOPT_USERAGENT] = $this->getUserAgent();
		if(ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) $options[CURLOPT_FOLLOWLOCATION] = true;
		$options[CURLOPT_RETURNTRANSFER] = true;
		$options[CURLOPT_TIMEOUT] = (int) $this->getTimeOut();
		$options[CURLOPT_SSL_VERIFYHOST] = false;
		$options[CURLOPT_SSL_VERIFYPEER] = false;

		// init
		$curl = curl_init();

		// set options
		curl_setopt_array($curl, $options);

		// execute
		$response = curl_exec($curl);
		$headers = curl_getinfo($curl);

		// fetch errors
		$errorNumber = curl_errno($curl);
		$errorMessage = curl_error($curl);

		// close
		curl_close($curl);

		// invalid headers
		if(!in_array($headers['http_code'], array(0, 200)))
		{
			// should we provide debug information
			if(self::DEBUG)
			{
				// make it output proper
				echo '<pre>';

				// dump the header-information
				var_dump($headers);

				// dump the raw response
				var_dump($response);

				// end proper format
				echo '</pre>';

				// stop the script
				exit();
			}

			// throw error
			throw new DocdataPaymentsException('Invalid headers (' . $headers['http_code'] . ')', (int) $headers['http_code']);
		}

		// error?
		if($errorNumber != '') throw new DocdataPaymentsException($errorMessage, $errorNumber);

		// we expect XML so decode it
		$xml = @simplexml_load_string($response);

		// validate XML
		if($xml === false) throw new DocdataPaymentsException('Invalid XML-response');

		// return
		return $xml;
	}

	/**
	 * Get the current mode
	 *
	 * @return string
	 */
	public function getMode()
	{
		return $this->mode;
	}

	/**
	 * Get the password
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the correct REST url
	 *
	 * @return string
	 */
	private function getRESTUrl()
	{
		if($this->getMode() == 'production') return 'https://www.docdatapayments.com/ps/com.tripledeal.paymentservice.servlets.PaymentService';
		return 'https://test.docdatapayments.com/ps/com.tripledeal.paymentservice.servlets.PaymentService';
	}

	/**
	 * Get the timeout that will be used
	 *
	 * @return int
	 */
	public function getTimeOut()
	{
		return (int) $this->timeOut;
	}

	/**
	 * Get the useragent that will be used.
	 * Our version will be prepended to yours.
	 * It will look like: "PHP Docdata Payments/<version> <your-user-agent>"
	 *
	 * @return string
	 */
	public function getUserAgent()
	{
		return (string) 'PHP Docdata Payments/' . self::VERSION . ' ' . $this->userAgent;
	}

	/**
	 * Get the username
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the correct WSDL
	 *
	 * @return string
	 */
	private function getWSDL()
	{
		if($this->getMode() == 'production') return 'http://www.tripledeal.com:80/ps/services/paymentservice/0_2?wsdl';
		return 'http://test.tripledeal.com:80/ps/services/paymentservice/0_2?wsdl';
	}

	/**
	 * Convert an object into an array
	 *
	 * @return array
	 * @param $object object
	 * @param $array array[optional]
	 */
	private static function objectToArray($object, $array = array())
	{
		// loop properties
		foreach($object as $key => $value)
		{
			// if the value is an object, we should loop it recursivaly
			if(is_object($value))
				$array[$key] = self::objectToArray($value, $array);

				// if the value isn't null we add it into the array
			elseif($value !== null)
				$array[$key] = $value;
		}

		// return
		return $array;
	}

	/**
	 * Set the mode
	 *
	 * @param $mode string mode to use. Possible values are: test, production
	 */
	public function setMode($mode)
	{
		// redefine
		$mode = (string) $mode;

		// validate
		if(!in_array($mode, array('test', 'production'))) throw new DocdataPaymentsException('Invalid mode, possible values are: test, production.');

		$this->mode = $mode;
	}

	/**
	 * Set the password
	 *
	 * @param $password string password.
	 */
	public function setPassword($password)
	{
		$this->password = (string) $password;
	}

	/**
	 * Set the timeout
	 * After this time the request will stop.
	 * You should handle any errors triggered by this.
	 *
	 * @param $seconds int timeout in seconds.
	 */
	public function setTimeOut($seconds)
	{
		$this->timeOut = (int) $seconds;
	}

	/**
	 * Set the user-agent for you application
	 * It will be appended to ours, the result will look like: "PHP Docdata Payments/<version> <your-user-agent>"
	 *
	 * @param $userAgent string user-agent, it should look like <app-name>/<app-version>.
	 */
	public function setUserAgent($userAgent)
	{
		$this->userAgent = (string) $userAgent;
	}

	/**
	 * Set the username
	 *
	 * @param $username string username to use.
	 */
	public function setUsername($username)
	{
		$this->username = (string) $username;
	}

	// payment methods
	/**
	 * Cancel a payment
	 *
	 * @param $paymentClusterKey string
	 * @param $clientLanguage string
	 * @return mixed
	 */
	public function cancelPayment($paymentClusterKey, $clientLanguage = null)
	{
		// build parameters
		$parameters = array();
		$parameters['command'] = 'cancel_payment_cluster';
		$parameters['merchant_name'] = $this->getUsername();
		$parameters['merchant_password'] = $this->getPassword();
		$parameters['payment_cluster_key'] = (string) $paymentClusterKey;
		if($clientLanguage != null) $parameters['client_language'] = (string) $clientLanguage;

		$base = $this->getRESTUrl();

		// make the call
		$response = $this->doRestCall($base . '?' . http_build_query($parameters));

		// validate
		if(!isset($response->msg['value'])) throw new DocdataPaymentsException('Invalid response');

		// get the message
		$message = (string) $response->msg['value'];

		// return boolean if everything went fine
		if($message == 'msg_transaction_canceled') return true;

		// return
		return (string) $response->msg['value'];
	}

	/**
	 * Get the payment status
	 *
	 * @param $paymentClusterKey string
	 * @return array
	 */
	public function getPaymentStatus($paymentClusterKey)
	{
		// build parameters
		$parameters = array();
		$parameters['command'] = 'status_payment_cluster';
		$parameters['merchant_name'] = $this->getUsername();
		$parameters['merchant_password'] = $this->getPassword();
		$parameters['payment_cluster_key'] = (string) $paymentClusterKey;
		$parameters['report_type'] = 'xml_all';

		$base = $this->getRESTUrl();

		// make the call
		$response = $this->doRestCall($base . '?' . http_build_query($parameters));

		$return = array();
		$return['status']['payment_cluster_process'] = (string) $response->status->payment_cluster_process;
		$return['status']['last_partial_payment_process'] = (string) $response->status->last_partial_payment_process;
		$return['status']['last_partial_payment_method'] = (string) $response->status->last_partial_payment_method;
		$return['status']['cluster_amount'] = (float) $response->status->cluster_amount;
		$return['status']['cluster_currency'] = (string) $response->status->cluster_currency;
		$return['status']['payout_process'] = (string) $response->status->payout_process;
		$return['status']['meta_considered_safe'] = ((string) $response->status->meta_considered_safe == 'true');
		$return['status']['meta_charged_back'] = (string) $response->status->meta_charged_back;
		$return['status']['meta_amount_received'] = (string) $response->status->meta_amount_received;

		$return['payments'] = array();

		if(isset($response->payments->payment))
		{
			foreach($response->payments->payment as $payment)
			{
				$temp = array();
				$temp['bincountry'] = (string) $payment['bincountry'];
				$temp['id'] = (string) $payment['id'];
				$temp['method'] = (string) $payment['method'];
				$temp['method_readable'] = (string) $payment['method-readable'];
				$temp['state'] = (string) $payment['state'];

				$temp['reason'] = (string) $payment->reason;
				$temp['payment_amount'] = (float) $payment->payment_amount;
				$temp['payment_currency'] = (string) $payment->payment_currency;
				$temp['payment_info']['pid'] = (string) $payment->{'payment-info'}->pid['value'];
				$temp['payment_info']['id'] = (string) $payment->{'payment-info'}->id['value'];
				$temp['payment_info']['holder_name'] = (string) $payment->{'payment-info'}->holder_name['value'];
				$temp['payment_info']['holder_address'] = (string) $payment->{'payment-info'}->holder_address['value'];
				$temp['payment_info']['holder_zipcode'] = (string) $payment->{'payment-info'}->holder_zipcode['value'];
				$temp['payment_info']['holder_city'] = (string) $payment->{'payment-info'}->holder_city['value'];
				$temp['payment_info']['holder_country'] = (string) $payment->{'payment-info'}->holder_country['value'];
				$temp['payment_info']['card_country'] = (string) $payment->{'payment-info'}->card_country['value'];
				$temp['payment_info']['PAN_last4'] = (string) $payment->{'payment-info'}->PAN_last4['value'];

				// add
				$return['payments'][] = $temp;
			}
		}

		return $return;
	}

	/**
	 * Refund a payment
	 *
	 * @param $paymentClusterKey string
	 * @param $paymentId string
	 * @param $refundAmount float amount of the refund, which must be smaller or equal to the amount of the transaction.
	 * @param $currency string[optional] ISO currency code of the transaction.
	 * @param $accountHolderName string[optional] and last name of the account holder
	 * @param $accountHolderPlace string[optional] of the account holder's bank
	 * @param $accountNUmber string[optional] account number of the account holder
	 * @param $iban string[optional] Bank Account Number
	 * @param $swiftCode string[optional] Identifier Code
	 * @param $bankName string[optional] of the bank
	 * @param $bankPlace string[optional]
	 * @return mixed
	 */
	public function refundPayment($paymentClusterKey, $paymentId, $refundAmount, $currency = 'EUR', $accountHolderName = null, $accountHolderPlace = null, $accountNumber = null, $iban = null, $swiftCode = null, $bankName = null, $bankPlace = null)
	{
		// build parameters
		$parameters = array();
		$parameters['command'] = 'request_refund';
		$parameters['merchant_name'] = $this->getUsername();
		$parameters['merchant_password'] = $this->getPassword();
		$parameters['payment_cluster_key'] = (string) $paymentClusterKey;
		$parameters['payment_id'] = (int) $paymentId;
		$parameters['refund_amount'] = (float) $refundAmount;
		$parameters['cur_refund_amount'] = (string) $currency;

		if($accountHolderName != null) $parameters['account_holder_name'] = (string) $accountHolderName;
		if($accountHolderPlace != null) $parameters['account_holder_place'] = (string) $accountHolderPlace;
		if($accountNumber != null) $parameters['account_number'] = (string) $accountNumber;
		if($iban != null) $parameters['Iban'] = (string) $iban;
		if($swiftCode != null) $parameters['swift_code'] = (string) $swiftCode;
		if($bankName != null) $parameters['bank_name'] = (string) $accountHolderName;
		if($bankPlace != null) $parameters['bank_place'] = (string) $bankPlace;

		// make the call
		$base = $this->getRESTUrl();

		// make teh call
		$response = $this->doRestCall($base . '?' . http_build_query($parameters));

		// validate
		if(!isset($response->msg['value'])) throw new DocdataPaymentsException('Invalid response');

		// get the message
		$message = (string) $response->msg['value'];

		// return boolean if everything went fine
		if($message == 'msg_request_refund_success') return true;

		// return
		return (string) $response->msg['value'];
	}

	public function requestPaymentClusterInfo($transactionId)
	{
		// build parameters
		$parameters = array();
		$parameters['command'] = 'request_payment_cluster_info';
		$parameters['merchant_name'] = $this->getUsername();
		$parameters['merchant_password'] = $this->getPassword();
		$parameters['merchant_transaction_id'] = (string) $transactionId;

		$base = $this->getRESTUrl();

		// make the call
		$response = $this->doRestCall($base . '?' . http_build_query($parameters));

		// init var
		$return = array();

		// any data available
		if(isset($response->payment_clusters->payment_cluster))
		{
			foreach($response->payment_clusters->payment_cluster as $cluster)
			{
				$temp = array();
				$temp['id'] = (string) $cluster['id'];
				$temp['merchant_transaction_id'] = (string) $cluster->merchant_transaction_id;
				$temp['payment_cluster_key'] = (string) $cluster->payment_cluster_key;
				$temp['date_created'] = (string) $cluster->date_created;

				$return[] = $temp;
			}
		}

		// return
		return $return;
	}

	// payment url
	/**
	 * Get the payment url
	 *
	 * @param $clientLanguage string
	 * @param $paymentClusterKey string
	 * @param $successUrl string[optional] Merchant’s web page where the shopper will be sent to after a successful transaction. Mandatory in back office.
	 * @param $canceledUrl string[optional] Merchant’s web page where the shopper will be sent to if they cancel their transaction. Mandatory in back office.
	 * @param $pendingUrl string[optional] Merchant’s web page where the shopper will be sent to if a payment is started successfully but not yet paid.
	 * @param $errorUrl string[optional] Merchant’s web page where the shopper will be sent to if an error occurs.
	 * @param $defaultPaymentMethod string[optional] ID of the default payment method.
	 * @param $defaultAct string[optional] if a default payment method is declared to direct the shopper to that payment method in the payment menu. Can contain the values “yes” or “no”.
	 * @return string
	 */
	public function getPaymentUrl($clientLanguage, $paymentClusterKey, $successUrl = null, $canceledUrl = null, $pendingUrl = null, $errorUrl = null, $defaultPaymentMethod = null, $defaultAct = null)
	{
		$parameters = array();
		$parameters['command'] = 'show_payment_cluster';
		$parameters['merchant_name'] = $this->getUsername();
		$parameters['client_language'] = (string) $clientLanguage;
		$parameters['payment_cluster_key'] = (string) $paymentClusterKey;

		if($successUrl !== null) $parameters['return_url_success'] = $successUrl;
		if($canceledUrl !== null) $parameters['return_url_canceled'] = $canceledUrl;
		if($pendingUrl !== null) $parameters['return_url_pending'] = $pendingUrl;
		if($errorUrl !== null) $parameters['return_url_error'] = $errorUrl;
		if($defaultPaymentMethod !== null) $parameters['default_pm'] = $defaultPaymentMethod;
		if($defaultAct !== null) $parameters['default_act'] = $defaultAct;

		$base = 'https://test.docdatapayments.com/ps/com.tripledeal.paymentservice.servlets.PaymentService';
		if($this->mode == 'production') $base = 'https://www.docdatapayments.com/ps/com.tripledeal.paymentservice.servlets.PaymentService';

		// build the url
		return $base . '?' . http_build_query($parameters);
	}

	/**
	 * Redirect to the payment url
	 *
	 * @param $clientLanguage string
	 * @param $paymentClusterKey string
	 * @param $successUrl string[optional] Merchant’s web page where the shopper will be sent to after a successful transaction. Mandatory in back office.
	 * @param $canceledUrl string[optional] Merchant’s web page where the shopper will be sent to if they cancel their transaction. Mandatory in back office.
	 * @param $pendingUrl string[optional] Merchant’s web page where the shopper will be sent to if a payment is started successfully but not yet paid.
	 * @param $errorUrl string[optional] Merchant’s web page where the shopper will be sent to if an error occurs.
	 * @param $defaultPaymentMethod string[optional] ID of the default payment method.
	 * @param $defaultAct string[optional] if a default payment method is declared to direct the shopper to that payment method in the payment menu. Can contain the values “yes” or “no”.
	 */
	public function redirectToPaymentUrl($clientLanguage, $paymentClusterKey, $successUrl = null, $canceledUrl = null, $pendingUrl = null, $errorUrl = null, $defaultPaymentMethod = null, $defaultAct = null)
	{
		// get the url
		$url = $this->getPaymentUrl($clientLanguage, $paymentClusterKey, $successUrl, $canceledUrl, $pendingUrl, $errorUrl, $defaultPaymentMethod, $defaultAct);

		// redirect
		header('location: ' . $url);
		exit();
	}

	// order methods
	/**
	 * Create a new Simple Order
	 *
	 * @param $order DocDataPaymentsSimpleOrder order object
	 * @return string
	 */
	public function simplePaymentOrder(DocdataPaymentsSimpleOrder $order)
	{
		// set the merchant info
		$order->setMerchantInfo($this->getUsername(), $this->getPassword());

		// make the call
		$response = $this->doCall('createSimplePaymentOrder', self::objectToArray($order));

		// return the key
		if(isset($response->paymentOrderSuccess->key)) return $response->paymentOrderSuccess->key;

		// error handling
		if(isset($response->paymentOrderError->error)) throw new DocdataPaymentsException((string) $response->paymentOrderError->error->_);
		throw new DocdataPaymentsException('Invalid response');
	}

	public function paymentOrder(DocdataPaymentsOrder $order)
	{
		// set the merchant info
		$order->setMerchantInfo($this->getUsername(), $this->getPassword());

		// make the call
		$response = $this->doCall('createPaymentOrder', self::objectToArray($order));

		// return the key
		if(isset($response->paymentOrderSuccess->key)) return $response->paymentOrderSuccess->key;

		// error handling
		if(isset($response->paymentOrderError->error)) throw new DocdataPaymentsException((string) $response->paymentOrderError->error->_);
		throw new DocdataPaymentsException('Invalid response');
	}

}

/**
 * Docdata Payments Address class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 * @version 1.0.0
 * @copyright Copyright (c) Tijs Verkoyen. All rights reserved.
 * @license BSD License
 */
class DocdataPaymentsAddress
{

	/**
	 * String properties
	 *
	 * @var string
	 */
	public $company, $street, $houseNumber, $houseNumberAddition, $city, $postalCode, $country;

	/**
	 * Create a address object
	 *
	 * @param $street string
	 * @param $houseNumber string
	 * @param $postalCode string
	 * @param $city string
	 * @param $country string
	 * @param $houseNumberAddition string[optional]
	 * @param $company string[optional]
	 */
	public function __construct($street, $houseNumber, $postalCode, $city, $country, $houseNumberAddition = null, $company = null)
	{
		// validate
		if(mb_strlen($company) > 35) throw new DocdataPaymentsException('Company can\'t be longer then 35chars.');
		if(mb_strlen($street) > 35) throw new DocdataPaymentsException('Street can\'t be longer then 35chars.');
		if(mb_strlen($houseNumber) > 35) throw new DocdataPaymentsException('Housenumber can\'t be longer then 35chars.');
		if(mb_strlen($houseNumberAddition) > 35) throw new DocdataPaymentsException('HouseNumberAddition can\'t be longer then 35chars.');
		if(mb_strlen($postalCode) > 35) throw new DocdataPaymentsException('PostalCode can\'t be longer then 35chars.');
		if(mb_strlen($city) > 35) throw new DocdataPaymentsException('City can\'t be longer then 35chars.');

		// set properties
		$this->street = (string) $street;
		$this->houseNumber = (string) $houseNumber;
		$this->postalCode = (string) $postalCode;
		$this->city = (string) $city;
		$this->country = new stdClass();
		$this->country->code = (string) $country;

		if($houseNumberAddition !== null) $this->houseNumberAddition = (string) $houseNumberAddition;
		if($company !== null) $this->company = (string) $company;
	}
}

/**
 * Docdata Payments Name class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 * @version 1.0.0
 * @copyright Copyright (c) Tijs Verkoyen. All rights reserved.
 * @license BSD License
 */
class DocdataPaymentsName
{

	/**
	 * String properties
	 *
	 * @var string
	 */
	public $prefix, $initials, $first, $middle, $last, $suffix;

	/**
	 * Create a name object
	 *
	 * @param $first string
	 * @param $last string
	 * @param $initials string[optional]
	 * @param $prefix string[optional]
	 * @param $middle string[optional]
	 * @param $suffix string[optional]
	 */
	public function __construct($first, $last, $initials = null, $prefix = null, $middle = null, $suffix = null)
	{
		// validate
		if(mb_strlen($prefix) > 50) throw new DocdataPaymentsException('Prefix can\'t be longer then 50chars.');
		if(mb_strlen($initials) > 35) throw new DocdataPaymentsException('Initials can\'t be longer then 35chars.');
		if(mb_strlen($first) > 35) throw new DocdataPaymentsException('First can\'t be longer then 35chars.');
		if(mb_strlen($middle) > 35) throw new DocdataPaymentsException('Middle can\'t be longer then 35chars.');
		if(mb_strlen($last) > 35) throw new DocdataPaymentsException('Last can\'t be longer then 35chars.');
		if(mb_strlen($suffix) > 50) throw new DocdataPaymentsException('Suffix can\'t be longer then 50chars.');

		// set properties
		$this->first = (string) $first;
		$this->last = (string) $last;
		if($initials !== null) $this->initials = (string) $initials;
		if($prefix !== null) $this->prefix = (string) $prefix;
		if($middle !== null) $this->middle = (string) $middle;
		if($suffix !== null) $this->suffix = (string) $suffix;
	}
}

/**
 * Docdata Payments Order class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 * @version 1.0.0
 * @copyright Copyright (c) Tijs Verkoyen. All rights reserved.
 * @license BSD License
 */
class DocdataPaymentsOrder extends DocdataPaymentsSimpleOrder
{

	/**
	 * Sub object
	 *
	 * @var mixed
	 */
	public $totalNetAmount, $totalVatAmount, $shipTo;

	/**
	 * String properties
	 *
	 * @var string
	 */
	public $additionalDescription;

	public $item;

	public function addItem($name, $code, $quantity, $description, $netAmount, $grossAmount, $vat, $vatRate, $vatCountry, $unitOfMeasure = 'PCS', $currency = 'EUR')
	{
		// validate
		if(mb_strlen($name) > 50) throw new DocdataPaymentsException('Name can\'t be longer then 50chars.');
		if(mb_strlen($code) > 50) throw new DocdataPaymentsException('Code can\'t be longer then 50chars.');
		if(!in_array($unitOfMeasure, array('PCS', 'SEC', 'BYT', 'KB'))) throw new DocdataPaymentsException('Invalid value for unitOfMeasure, possible values are: PCS, SEC, BYT, KB');
		if(mb_strlen($description) > 100) throw new DocdataPaymentsException('Description can\'t be longer then 100chars.');

		$item = new stdClass();
		$item->number = (count($this->item) + 1);
		$item->name = (string) $name;
		$item->code = (string) $code;
		$item->quantity = new stdClass();
		$item->quantity->_ = (int) $quantity;
		$item->quantity->unitOfMeasure = (string) $unitOfMeasure;
		$item->description = (string) $description;
		$item->netAmount = new stdClass();
		$item->netAmount->_ = (float) $netAmount;
		$item->netAmount->currency = (string) $currency;

		$item->grossAmount = new stdClass();
		$item->grossAmount->_ = (float) $grossAmount;
		$item->grossAmount->currency = (string) $currency;

		$item->vat = new stdClass();
		$item->vat->rate = (float) $vatRate;
		$item->vat->amount = new stdClass();
		$item->vat->amount->_ = (float) $vat;
		$item->vat->amount->currency = (string) $currency;
		$item->vat->country = new stdClass();
		$item->vat->country->code = (string) $vatCountry;

		$item->totalNetAmount = new stdClass();
		$item->totalNetAmount->_ = (int) $quantity * (float) $netAmount;
		$item->totalNetAmount->currency = (string) $currency;

		$item->totalGrossAmount = new stdClass();
		$item->totalGrossAmount->_ = (int) $quantity * (float) $grossAmount;
		$item->totalGrossAmount->currency = (string) $currency;

		$item->totalVat = new stdClass();
		$item->totalVat->rate = (float) $vatRate;
		$item->totalVat->amount = new stdClass();
		$item->totalVat->amount->_ = (int) $quantity * (float) $vat;
		$item->totalVat->amount->currency = (string) $currency;
		$item->totalVat->country = new stdClass();
		$item->totalVat->country->code = (string) $vatCountry;

		$this->item[] = $item;
	}

	/**
	 * Set the total netto amount
	 *
	 * @param $value float
	 * @param $currency string[optional]
	 */
	public function setTotalNetAmount($value, $currency = 'EUR')
	{
		if($this->totalNetAmount === null) $this->totalNetAmount = new stdClass();

		$this->totalNetAmount->currency = (string) $currency;
		$this->totalNetAmount->_ = (string) ((float) $value * 100);
	}

	/**
	 * Set the total VAT amount
	 *
	 * @param $value float
	 * @param $currency string[optional]
	 */
	public function setTotalVatAmount($value, $rate, $currency = 'EUR')
	{
		if($this->totalVatAmount === null) $this->totalVatAmount = new stdClass();

		$this->totalVatAmount->currency = (string) $currency;
		$this->totalVatAmount->rate = (float) $rate;
		$this->totalVatAmount->_ = (string) ((float) $value * 100);
	}

	/**
	 * Set the ship to
	 *
	 * @param $name DocdataPaymentsName
	 * @param $address DocdataPaymentsAddress
	 */
	public function setShipTo(DocdataPaymentsName $name, DocdataPaymentsAddress $address)
	{
		if($this->shipTo === null) $this->shipTo = new stdClass();

		$this->shipTo->name = $name;
		$this->shipTo->address = $address;
	}
}

/**
 * Docdata Payments Simple Order class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 * @version 1.0.0
 * @copyright Copyright (c) Tijs Verkoyen. All rights reserved.
 * @license BSD License
 */
class DocdataPaymentsSimpleOrder
{

	/**
	 * Sub objects
	 *
	 * @var mixed
	 */
	public $merchant, $paymentPreferences, $shopper, $menuPreferences, $totalGrossAmount, $merchantOrderReference, $billTo;

	/**
	 * String properties
	 *
	 * @var string
	 */
	public $description, $receiptText, $version = '0.2';

	/**
	 * Boolean properties
	 *
	 * @var bool
	 */
	public $includeCosts;

	/**
	 * Set the bill to
	 *
	 * @param $name DocdataPaymentsName
	 * @param $address DocdataPaymentsAddress
	 */
	public function setBillTo(DocdataPaymentsName $name, DocdataPaymentsAddress $address)
	{
		if($this->billTo === null) $this->billTo = new stdClass();

		$this->billTo->name = $name;
		$this->billTo->address = $address;
	}

	/**
	 * Set the marchant info
	 *
	 * @param $name string name of the merchant.
	 * @param $password string password.
	 */
	public function setMerchantInfo($name, $password)
	{
		// validate
		if(mb_strlen($name) > 50) throw new DocdataPaymentsException('Name can\'t be longer then 50chars.');
		if(mb_strlen($password) > 35) throw new DocdataPaymentsException('Password can\'t be longer then 35chars.');

		// init if needed
		if($this->merchant === null) $this->merchant = new stdClass();

		// set properties
		$this->merchant->name = (string) $name;
		$this->merchant->password = (string) $password;
	}

	/**
	 * Set the merchant order reference
	 *
	 * @param $reference string
	 */
	public function setMerchantOrderReference($reference)
	{
		if(mb_strlen($reference) > 50) throw new DocdataPaymentsException('MerchantOrderReference can\'t be longer then 50chars.');

		$this->merchantOrderReference = (string) $reference;
	}

	/**
	 * Set the menu preferences
	 *
	 * @param $css string
	 * @param $showCancelButton bool[optional]
	 * @param $forceCountry bool[optional]
	 */
	public function setMenuPreferences($css = null, $showCancelButton = null, $forceCountry = null)
	{
		if($this->menuPreferences === null) $this->menuPreferences = new stdClass();
		if($css !== null) $this->menuPreferences->css = (string) $css;
		if($showCancelButton !== null) $this->menuPreferences->showCancelButton = (bool) $showCancelButton;
		if($forceCountry !== null) $this->menuPreferences->forceCountry = (bool) $forceCountry;
	}

	/**
	 * Set the payment preferences
	 *
	 * @param $profile string[optional]
	 * @param $numberOfDaysToPay int[optional]
	 * @param $exhortation string[optional]
	 * @param $template string[optional]
	 */
	public function setPaymentPreferences($profile = 'standard', $numberOfDaysToPay = 30, $exhortation = null, $template = null)
	{
		// validate
		if(mb_strlen($profile) > 50) throw new DocdataPaymentsException('Profile can\'t be longer then 50chars.');

		// init if needed
		if($this->paymentPreferences === null) $this->paymentPreferences = new stdClass();

		$this->paymentPreferences->profile = (string) $profile;
		$this->paymentPreferences->numberOfDaysToPay = (int) $numberOfDaysToPay;

		if($exhortation !== null) $this->paymentPreferences->exhortation = $exhortation;
		if($template !== null) $this->paymentPreferences->template = $template;
	}

	/**
	 * Set the shopper
	 *
	 * @param $id string
	 * @param $name DocdataPaymentsName
	 * @param $email string
	 * @param $language string
	 * @param $gender string
	 * @param $dateOfBirth string
	 * @param $phoneNumber string
	 * @param $mobilePhoneNumber string
	 */
	public function setShopper($id, DocdataPaymentsName $name, $email, $language, $gender = 'U', $dateOfBirth = null, $phoneNumber = null, $mobilePhoneNumber = null)
	{
		// validate
		if(!in_array($gender, array('M', 'F', 'U'))) throw new DocdataPaymentsException('Invalid value for gender, possible values are: M, F, U.');
		if(mb_strlen($id) > 35) throw new DocdataPaymentsException('Id can\'t be longer then 35chars.');
		if(mb_strlen($phoneNumber) > 50) throw new DocdataPaymentsException('PhoneNumber can\'t be longer then 50chars.');
		if(mb_strlen($mobilePhoneNumber) > 50) throw new DocdataPaymentsException('MobilePhoneNumber can\'t be longer then 50chars.');

		// init if needed
		if($this->shopper === null) $this->shopper = new stdClass();

		$this->shopper->id = (string) $id;
		$this->shopper->name = $name;
		$this->shopper->email = (string) $email;
		$this->shopper->language = new stdClass();
		$this->shopper->language->code = (string) $language;
		$this->shopper->gender = (string) $gender;

		if($dateOfBirth !== null) $this->shopper->dateOfBirth = (string) $dateOfBirth;
		if($phoneNumber !== null) $this->shopper->phoneNumber = (string) $phoneNumber;
		if($mobilePhoneNumber !== null) $this->shopper->mobilePhoneNumber = (string) $mobilePhoneNumber;
	}

	/**
	 * Set the total gross amount
	 *
	 * @param $value float
	 * @param $currency string[optional]
	 */
	public function setTotalGrossAmount($value, $currency = 'EUR')
	{
		if($this->totalGrossAmount === null) $this->totalGrossAmount = new stdClass();

		$this->totalGrossAmount->currency = (string) $currency;
		$this->totalGrossAmount->_ = (string) ((float) $value * 100);
	}
}

/**
 * DocdataPayments Exception class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class DocdataPaymentsException extends Exception
{}