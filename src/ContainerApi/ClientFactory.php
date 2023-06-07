<?php

namespace App\ContainerApi;

use Productsup\ContainerApi\Client\Client;

class ClientFactory
{
    public function build(): Client
    {
        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => $_ENV['CLIENT_BASE_URI'],
        ]);

        return Client::create($httpClient);
    }
}