<?php

namespace App\Services;

use GuzzleHttp\Client;

class RajaOngkirService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCities()
    {
        $response = $this->client->request('GET', 'city');
        return json_decode($response->getBody()->getContents(), true);
    }
}
