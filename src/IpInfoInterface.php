<?php namespace TheLHC\IpInfo;

interface IpInfoInterface
{
  
  /**
   * Query Ip lookup service for $ip
   *
   * @param  string $ip
   * @return stdClass
   */
  public function lookup($ip);

}
