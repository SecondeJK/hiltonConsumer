<?php
namespace App\ApiClient;

use GuzzleHttp\Client;

class ApiClient
{
    public function makeApiCall(string $url)
    {
        $client = new Client();
        $result = $client->request('GET', $url);
        if ($result->getStatusCode() === 200) {
            return json_decode($result->getBody(), true);
        } else {
            throw new \ErrorException("Bad Request to API");
        }
    }
}