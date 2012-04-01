<?php

require_once 'config.php';
require_once '../docdata_payments.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 *  DocdataPayments test case.
 */
class DocdataPaymentsTest extends PHPUnit_Framework_TestCase
{
	/**
	 * The instance
	 * @var DocdataPayments
	 */
	private $docdataPayments;


	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp()
	{
		parent::setUp ();

		$this->docdataPayments = new DocdataPayments(USERNAME, PASSWORD);
	}


	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown()
	{
		$this->docdataPayments = null;

		parent::tearDown ();
	}


	/**
	 * Tests CampaignCommander->getTimeOut()
	 */
	public function testGetTimeOut()
	{
		$this->docdataPayments->setTimeOut(5);
		$this->assertEquals(5, $this->docdataPayments->getTimeOut());
	}


	/**
	 * Tests CampaignCommander->getUserAgent()
	 */
	public function testGetUserAgent()
	{
		$this->docdataPayments->setUserAgent('testing/1.0.0');
		$this->assertEquals('PHP PHP Docdata Payments/' . DocdataPayments::VERSION . ' testing/1.0.0', $this->docdataPayments->getUserAgent());
	}
}

