<?php namespace TheLHC\IpInfo;

use Illuminate\Support\Facades\Facade;

class IpInfoFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
      return 'TheLHC\IpInfo\IpInfo';
    }

}
