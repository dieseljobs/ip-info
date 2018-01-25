<?php

namespace TheLHC\IpInfo\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use TheLHC\IpInfo\IpInfoServiceProvider;

class TestCase extends BaseTestCase
{

    /**
     * Get package service providers.
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            IpInfoServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'IpInfo' => 'TheLHC\IpInfo\Facades\IpInfo'
        ];
    }


}
