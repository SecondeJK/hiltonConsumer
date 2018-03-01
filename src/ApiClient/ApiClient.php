<?php
namespace App\ApiClient;

use GuzzleHttp\Client;

class ApiClient
{
    public function returnBodyFromApiCall(string $url)
    {
        $client = new Client();
        $result = $client->request('GET', $url);

        return $result->getBody();
    }
}