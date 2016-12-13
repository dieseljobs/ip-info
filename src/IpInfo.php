<?php namespace TheLHC\IpInfo;

class IpInfo
{
    /**
     * The implementation of IpInfoInterface
     *
     * @var TheLHC\IpInfo\IpInfoInterface
     */
    private $repo;

    /**
     * Create new instance of IpInfo
     *
     * @param TheLHC\IpInfo\IpInfoInterface $repo
     */
    public function __construct(IpInfoInterface $repo)
    {
      $this->repo = $repo;
    }

    /**
     * Lookup and retreive details for ip address
     *
     * @param  string $ip
     * @return stdClass
     */
    public function lookup($ip)
    {
      return $this->repo->lookup($ip);
    }
}
