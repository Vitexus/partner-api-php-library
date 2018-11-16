<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2018-11-16 at 12:16:30.
 */
class Slevomat_Client_PartnerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Slevomat_Client_Partner
     */
    protected $object;

    /**
     * Get Method accessible
     * 
     * @param string $name
     * 
     * @return type
     */
    protected static function getMethod($name)
    {
        $class  = new ReflectionClass('Slevomat_Client_Partner');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Slevomat_Client_Partner(Slevomat_Client_Partner::SERVER_CZ,
            constant('SLEVOMAT_TOKEN'));
    }

    /**
     * Test Constructor
     *
     * @expectedException RuntimeException
     * @expectedExceptionMessage An invalid server was provided: "noserver".
     * @covers Slevomat_Client_Partner::__construct
     */
    public function testConstructor()
    {
        // Get mock, without the constructor being called
        $mock = $this->getMockBuilder(get_class($this->object))
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $mock->__construct(Slevomat_Client_Partner::SERVER_SK,
            constant('SLEVOMAT_TOKEN'));

        $mock->__construct('noserver', 'notoken');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    /**
     * @covers Slevomat_Client_Partner::checkVoucher
     */
    public function testCheckVoucher()
    {
        $code    = constant('VOUCHER_CODE');
        $checked = $this->object->checkVoucher($code, $response);
    }

    /**
     * @covers Slevomat_Client_Partner::applyVoucher
     */
    public function testApplyVoucher()
    {
        $code    = constant('VOUCHER_CODE');
        $applied = $this->object->applyVoucher($code, $response);
    }

    /**
     * @covers Slevomat_Client_Partner::performRequest
     */
    public function testPerformRequest()
    {
        $performRequest = self::getMethod('performRequest');
        $result         = $performRequest->invokeArgs($this->object,
            ['vouchercheck',
            ['token' => constant('SLEVOMAT_TOKEN'), 'code' => constant('VOUCHER_CODE')]
        ]);
    }

    /**
     * @before checkVoucher
     * @covers Slevomat_Client_Partner::prepareRequest
     */
    public function testPrepareRequest()
    {
        $performRequest = self::getMethod('prepareRequest');
        $result         = $performRequest->invoke($this->object);
    }

    /**
     * @covers Slevomat_Client_Partner::prepareRequestUrl
     */
    public function testPrepareRequestUrl()
    {
        $performRequest = self::getMethod('prepareRequestUrl');
        $result         = $performRequest->invokeArgs($this->object,
            ['action',
            ['param' => 'value']]);
        $this->assertEquals('https://www.slevomat.cz/api/action?param=value',
            $result);
    }

    /**
     * @covers Slevomat_Client_Partner::checkRequirements
     */
    public function testCheckRequirements()
    {
        $performRequest = self::getMethod('checkRequirements');
        $result         = $performRequest->invoke($this->object);
    }
}