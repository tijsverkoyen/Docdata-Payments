<?php

require_once '../../../autoload.php';
require_once 'config.php';
require_once 'PHPUnit/Framework/TestCase.php';

use \TijsVerkoyen\DocDataPayments\DocDataPayments;

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
        $this->docDataPayments->setUserAgent('testing/1.0.0');
        $this->assertEquals(
            'PHP DocDataPayments/' . DocDataPayments::VERSION . ' testing/1.0.0',
            $this->docDataPayments->getUserAgent()
        );
    }
}
