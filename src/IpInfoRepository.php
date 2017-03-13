<?php namespace TheLHC\IpInfo;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IpInfoRepository implements IpInfoInterface
{
    private $error;

    /**
     * Query Ip lookup service for $ip
     *
     * @param  string $ip
     * @return stdClass
     */
    public function lookup($ip)
    {
        if ($ip == '127.0.0.1') {
          return (object)[
            'status'  => 'error',
            'errorMessage'  => 'Cannot lookup localhost'
          ];
        }
        if ($this->isReserved($ip)) {
            return (object)[
              'status'  => 'error',
              'errorMessage'  => 'Cannot lookup reserved ip'
            ];
        }
        $client = new Client();
        try {
          $response = $client->request(
            'GET',
            "http://ipinfo.io/{$ip}"
          );
          if ($response->getStatusCode() == "200") {
              return (object)[
                  'status'  => 'success',
                  'results' => json_decode($response->getBody()->getContents())
              ];
          } else {
              return (object)[
                'status'  => 'error',
                'errorMessage'  => $response->getStatusCode()
              ];
          }
        } catch (RequestException $e) {
            $this->error = $e->getMessage();
            return (object)[
              'status'  => 'error',
              'errorMessage'  => $this->error
            ];
        }
    }

    public function isReserved($ip)
    {
        $ipNum = "";
        $pieces = preg_split("/\./", $ip);
        foreach($pieces as $index => $piece) {
            $prefZeros = (3 - strlen($piece));
            for ($i = 1; $i <= $prefZeros; $i++) {
                $ipNum .= "0";
            }
            $ipNum .= $piece;
        }
        // cast to integer
        $ipNum = (int)$ipNum;

        if (
            ($ipNum >= 10000000000 && $ipNum <= 10255255255) or
            ($ipNum >= 172016000000 && $ipNum <= 172031255255) or
            ($ipNum >= 192168000000 && $ipNum <= 192168255255)
        ) {
            return true;
        } else {
            return false;
        }
    }
}
