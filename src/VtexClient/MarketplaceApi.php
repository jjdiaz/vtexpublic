<?php

namespace App\VtexClient;

use App\VtexClient\Model\FulfillmentOrder;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class MarketplaceApi
{
    public function __construct(
        private Client $client,
        private string $accountName,
        private string $environment,
    )
    {
    }

    public function placeFulfillmentOrder(FulfillmentOrder $fulfillmentOrder): void
    {
        $request = new Request('POST', "$this->accountName.$this->environment.com.br/api/fulfillment/pvt/orders", body: $fulfillmentOrder->toJson());

        $response = $this->client->sendRequest($request);
    }
}