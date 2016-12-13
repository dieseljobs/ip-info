<?php

namespace TheLHC\IpInfo;

use TheLHC\IpInfo\IpInfo;
use TheLHC\IpInfo\IpInfoRepository;

class IpInfoTest extends \PHPUnit_Framework_TestCase
{
    private $ipInfo;

    public function setUp()
    {
        $this->ipInfo = new IpInfo(
            new IpInfoRepository
        );
    }

    public function testItReturnsErrorWithBadIp()
    {
        $lookup = $this->ipInfo->lookup('1234');
        $this->assertTrue(property_exists($lookup, 'status'));
        $this->assertEquals('error', $lookup->status);
    }

    public function testItReturnsErrorWithLocalhost()
    {
        $lookup = $this->ipInfo->lookup('127.0.0.1');
        $this->assertTrue(property_exists($lookup, 'status'));
        $this->assertEquals('error', $lookup->status);
    }

    public function testItReturnsSuccessWithIp()
    {
        $lookup = $this->ipInfo->lookup('68.119.229.33');
        $this->assertTrue(property_exists($lookup, 'status'));
        $this->assertEquals('success', $lookup->status);
    }

}
