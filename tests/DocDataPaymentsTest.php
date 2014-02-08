<?php

require_once '../../../autoload.php';
require_once 'config.php';
require_once 'PHPUnit/Framework/TestCase.php';

use \TijsVerkoyen\DocDataPayments\DocDataPayments;
use \TijsVerkoyen\DocDataPayments\Types\PaidLevel;

/**
 * test case.
 */
class DocDataPaymentsTest extends PHPUnit_Framework_TestCase
{
    /**
     * DocDataPayments instance
     *
     * @var	DocDataPayments
     */
    private $docDataPayments;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->docDataPayments = new DocDataPayments(WSDL);
        $this->docDataPayments->setCredentials(USERNAME, PASSWORD);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->docDataPayments = null;
        parent::tearDown();
    }

    /**
     * Tests DocDataPayments->getTimeOut()
     */
    public function testGetTimeOut()
    {
        $this->docDataPayments->setTimeOut(5);
        $this->assertEquals(5, $this->docDataPayments->getTimeOut());
    }

    /**
     * Tests DocDataPayments->getUserAgent()
     */
    public function testGetUserAgent()
    {
        $this->docDataPayments->setUserAgent('testing/1.1.0');
        $this->assertEquals(
            'PHP DocDataPayments/' . DocDataPayments::VERSION . ' testing/1.1.0',
            $this->docDataPayments->getUserAgent()
        );
    }

    /**
     * Tests DocDataPayments->create()
     */
    public function testCreate()
    {
        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $shopper = new \TijsVerkoyen\DocDataPayments\Types\Shopper();
        $shopper->setId(1);
        $shopper->setGender('M');
        $shopper->setName($name);
        $shopper->setEmail('php-docdatapayments@verkoyen.eu');
        $shopper->setLanguage(new \TijsVerkoyen\DocDataPayments\Types\Language('nl'));

        $totalGrossAmount = new \TijsVerkoyen\DocDataPayments\Types\Amount(2000);

        $address = new \TijsVerkoyen\DocDataPayments\Types\Address();
        $address->setStreet('Kerkstraat');
        $address->setHouseNumber(108);
        $address->setPostalCode('9050');
        $address->setCity('Gentbrugge');
        $address->setCountry(new \TijsVerkoyen\DocDataPayments\Types\Country('BE'));

        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $billTo = new \TijsVerkoyen\DocDataPayments\Types\Destination();
        $billTo->setName($name);
        $billTo->setAddress($address);

        $paymentPreferences = new \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences();
        $paymentPreferences->setProfile('standard');
        $paymentPreferences->setNumberOfDaysToPay(4);

        $response = $this->docDataPayments->create(
            microtime(),
            $shopper,
            $totalGrossAmount,
            $billTo,
            $paymentPreferences
        );

        $this->assertInstanceOf('\TijsVerkoyen\DocDataPayments\Types\CreateSuccess', $response);
    }

    /**
     * Tests DocDataPayments->cancel()
     */
    public function testCancel()
    {
        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $shopper = new \TijsVerkoyen\DocDataPayments\Types\Shopper();
        $shopper->setId(1);
        $shopper->setGender('M');
        $shopper->setName($name);
        $shopper->setEmail('php-docdatapayments@verkoyen.eu');
        $shopper->setLanguage(new \TijsVerkoyen\DocDataPayments\Types\Language('nl'));

        $totalGrossAmount = new \TijsVerkoyen\DocDataPayments\Types\Amount(2000);

        $address = new \TijsVerkoyen\DocDataPayments\Types\Address();
        $address->setStreet('Kerkstraat');
        $address->setHouseNumber(108);
        $address->setPostalCode('9050');
        $address->setCity('Gentbrugge');
        $address->setCountry(new \TijsVerkoyen\DocDataPayments\Types\Country('BE'));

        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $billTo = new \TijsVerkoyen\DocDataPayments\Types\Destination();
        $billTo->setName($name);
        $billTo->setAddress($address);

        $paymentPreferences = new \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences();
        $paymentPreferences->setProfile('standard');
        $paymentPreferences->setNumberOfDaysToPay(4);

        $var = $this->docDataPayments->create(
            microtime(),
            $shopper,
            $totalGrossAmount,
            $billTo,
            $paymentPreferences
        );

        $response = $this->docDataPayments->cancel($var->getKey());

        $this->assertInstanceOf('\TijsVerkoyen\DocDataPayments\Types\CancelSuccess', $response);
        $this->assertEquals('SUCCESS', $response->getSuccess()->getCode());
    }

    /**
     * Tests DocDataPayments->capture()
     */
    public function testCapture()
    {
        $this->markTestSkipped('we can\'t test this without using a fixed payment id, so alter the id below');
        $response = $this->docDataPayments->capture(4905992874);

        $this->assertInstanceOf('\TijsVerkoyen\DocDataPayments\Types\CaptureSuccess', $response);
        $this->assertEquals('SUCCESS', $response->getSuccess()->getCode());
    }

    /**
     * Tests DocDataPayments->refund()
     */
    public function testRefund()
    {
        $this->markTestSkipped('we can\'t test this without using a fixed payment id, so alter the id below');
        $response = $this->docDataPayments->refund(4905992874);

        $this->assertInstanceOf('\TijsVerkoyen\DocDataPayments\Types\RefundSuccess', $response);
        $this->assertEquals('SUCCESS', $response->getSuccess()->getCode());
    }

    /**
     * Tests DocDataPayments->status()
     */
    public function testStatus()
    {
        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $shopper = new \TijsVerkoyen\DocDataPayments\Types\Shopper();
        $shopper->setId(1);
        $shopper->setGender('M');
        $shopper->setName($name);
        $shopper->setEmail('php-docdatapayments@verkoyen.eu');
        $shopper->setLanguage(new \TijsVerkoyen\DocDataPayments\Types\Language('nl'));

        $totalGrossAmount = new \TijsVerkoyen\DocDataPayments\Types\Amount(2000);

        $address = new \TijsVerkoyen\DocDataPayments\Types\Address();
        $address->setStreet('Kerkstraat');
        $address->setHouseNumber(108);
        $address->setPostalCode('9050');
        $address->setCity('Gentbrugge');
        $address->setCountry(new \TijsVerkoyen\DocDataPayments\Types\Country('BE'));

        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $billTo = new \TijsVerkoyen\DocDataPayments\Types\Destination();
        $billTo->setName($name);
        $billTo->setAddress($address);

        $paymentPreferences = new \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences();
        $paymentPreferences->setProfile('standard');
        $paymentPreferences->setNumberOfDaysToPay(4);

        $var = $this->docDataPayments->create(
            microtime(),
            $shopper,
            $totalGrossAmount,
            $billTo,
            $paymentPreferences
        );

        $response = $this->docDataPayments->status($var->getKey());

        $this->assertInstanceOf('\TijsVerkoyen\DocDataPayments\Types\StatusSuccess', $response);
        $this->assertEquals('SUCCESS', $response->getSuccess()->getCode());
    }

    public function testStatusNotPaid()
    {
        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $shopper = new \TijsVerkoyen\DocDataPayments\Types\Shopper();
        $shopper->setId(1);
        $shopper->setGender('M');
        $shopper->setName($name);
        $shopper->setEmail('php-docdatapayments@verkoyen.eu');
        $shopper->setLanguage(new \TijsVerkoyen\DocDataPayments\Types\Language('nl'));

        $totalGrossAmount = new \TijsVerkoyen\DocDataPayments\Types\Amount(2000);

        $address = new \TijsVerkoyen\DocDataPayments\Types\Address();
        $address->setStreet('Kerkstraat');
        $address->setHouseNumber(108);
        $address->setPostalCode('9050');
        $address->setCity('Gentbrugge');
        $address->setCountry(new \TijsVerkoyen\DocDataPayments\Types\Country('BE'));

        $name = new \TijsVerkoyen\DocDataPayments\Types\Name();
        $name->setFirst('Tijs');
        $name->setLast('Verkoyen');

        $billTo = new \TijsVerkoyen\DocDataPayments\Types\Destination();
        $billTo->setName($name);
        $billTo->setAddress($address);

        $paymentPreferences = new \TijsVerkoyen\DocDataPayments\Types\PaymentPreferences();
        $paymentPreferences->setProfile('standard');
        $paymentPreferences->setNumberOfDaysToPay(4);

        $var = $this->docDataPayments->create(
            microtime(),
            $shopper,
            $totalGrossAmount,
            $billTo,
            $paymentPreferences
        );

        $paidLevel = $this->docDataPayments->statusPaid($var->getKey());


        $this->assertEquals(PaidLevel::NotPaid, $paidLevel);
    }

    /**
     * Tests DocDataPayments->statusPaid()
     */
    public function testStatusPaid()
    {
        $this->markTestSkipped('we can\'t test this without a manually docdata transaction, that has been paid.');

        //Please read the manual about the paidLevel
        $paidLevel = $this->docDataPayments->statusPaid('123ABD');

        $this->assertTrue(in_array($paidLevel, array(PaidLevel::BalancedRoute, PaidLevel::SafeRoute)));

    }
}
