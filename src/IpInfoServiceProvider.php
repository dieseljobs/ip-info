<?php namespace TheLHC\IpInfo;

use Illuminate\Support\ServiceProvider;

class IpInfoServiceProvider extends ServiceProvider
{

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
      $this->app->bind('TheLHC\IpInfo\IpInfoInterface', function($app)
      {
          return new IpInfoRepository(new IpInfoInterface());
      });

      $this->app->bind('TheLHC\IpInfo\IpInfo', function($app)
      {
        return new IpInfo(
            $app->make('TheLHC\IpInfo\IpInfoInterface')
        );
      });
  }

}
