<?php

namespace App\VtexClient;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class ClientFactory
{
    public function __construct(
        private ?HandlerStack $handlerStack,
        private string        $appKey,
        private string        $appToken,
    )
    {

    }

    public function build(): Client
    {
        $config = [
            'base_uri' => "https://" . $_ENV['VTEX_ACCOUNT_NAME'] . '.' . $_ENV['VTEX_ENVIROMENT'] ,
            'headers' => [
                'Accept' => "application/json",
                'Content-Type' => "application/json",
                'X-VTEX-API-AppKey' => $this->appKey,
                'X-VTEX-API-AppToken' => $this->appToken,
            ]
        ];

        if ($this->handlerStack !== null) {
            $config['handler'] = $this->handlerStack;
        }
        return new Client($config);
    }
}