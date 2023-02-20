<?php

namespace App\ContainerApi;

use Productsup\ContainerApi\Client\Client;

class ClientFactory
{
    public function build(): Client
    {
        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://cde-container-api',
        ]);

        return Client::create($httpClient);
    }
}