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
}
