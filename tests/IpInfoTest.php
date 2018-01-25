<?php

use TheLHC\IpInfo\Tests\TestCase;


class IpInfoTest extends TestCase
{

    public function testItReturnsErrorWithBadIp()
    {
        $lookup = IpInfo::lookup('1234');
        $this->assertTrue(property_exists($lookup, 'status'));
        $this->assertEquals('error', $lookup->status);
    }

    public function testItReturnsErrorWithLocalhost()
    {
        $lookup = IpInfo::lookup('127.0.0.1');
        $this->assertTrue(property_exists($lookup, 'status'));
        $this->assertEquals('error', $lookup->status);
    }

    public function testItReturnsErrorWithPrivateIp()
    {
        $lookup = IpInfo::lookup('10.0.0.0');
        $this->assertTrue(property_exists($lookup, 'status'));
        $this->assertEquals('error', $lookup->status);
    }

    public function testItReturnsSuccessWithIp()
    {
        $lookup = IpInfo::lookup('68.119.229.33');
        $this->assertTrue(property_exists($lookup, 'status'));
        $this->assertEquals('success', $lookup->status);
    }

}
