<?php

namespace App\Repository;

use App\VtexClient\Model\FulfillmentOrder;

class FulfillmentOrderRepo
{
    private array $fulfillmentOrders = [];

    public function saveFulfillmentOrder(string $id, FulfillmentOrder $fulfilmentOrder): void
    {
        $this->fulfillmentOrders[$id] = $fulfilmentOrder;
    }

    public function getFulfillmentOrder(string $id): FulfillmentOrder
    {
        if($this->hasFulfillmentOrder($id))
            return $this->fulfillmentOrders[$id];

        throw new \Exception("Can not get non-existing order");
    }

    public function hasFulfillmentOrder(string $id): bool
    {
        return array_key_exists($id, $this->fulfillmentOrders);
    }

    public function getAllOrders(): array
    {
        return $this->fulfillmentOrders;
    }
}