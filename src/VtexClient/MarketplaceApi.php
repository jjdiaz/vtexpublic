<?php

namespace App\VtexClient;

use App\ContainerApi\ContainerApiInterface;
use App\VtexClient\Model\FulfillmentOrder;
use App\VtexClient\Model\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class MarketplaceApi
{
    public function __construct(
        private Client $client,
        private string $accountName,
        private string $environment,
        private ContainerApiInterface $containerApi
    )
    {
    }

    public function placeFulfillmentOrder(FulfillmentOrder $fulfillmentOrder): void
    {
        $request = new Request(
            'POST',
            "https://$this->accountName.$this->environment/api/fulfillment/pvt/orders",
            body: $fulfillmentOrder->toJson());

        $response = $this->client->sendRequest($request);
    }

    public function createProduct(Product $product): void
    {
        $base = $this->client->getConfig('base_url');
        $request = new Request(
            method:'POST',
            uri:"/api/catalog/pvt/product",
            body: $product->toJson()
        );

        try{
            $response = $this->client->sendRequest($request);
            if($response->getStatusCode() >= 400){
                $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_ERROR, 'Error creating Product RefId =' . $product->refId . $response->getReasonPhrase() . ". " . $response->getBody()->getContents());
            }
        }catch (\Throwable $e){
            $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_ERROR, 'Error creating Product RefId =' . $product->refId . $e->getMessage());
        }
    }
}