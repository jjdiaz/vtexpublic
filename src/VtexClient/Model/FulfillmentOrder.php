<?php

namespace App\VtexClient\Model;

class FulfillmentOrder
{
    public string $marketplaceOrderId;
    public string $marketplaceServicesEndpoint;
    public int $marketplacePaymentValue;

    /** @var Item[] */
    public array $items;
    public ClientProfileData $clientProfileData;

    public function addItem(Item $item):void
    {
        $this->items[] = $item;
    }

    public static function fromArray(array $data): self{
        $self = new self();
        $self->marketplaceOrderId = $data['marketplaceOrderId'];

        return $self;
    }

    public function toJson():string
    {
        return json_encode([
            'marketplaceOrderId' => $this->marketplaceOrderId,
            'items' => array_map(fn ($item) => $item->toArray(), $this->items)
        ]);
    }
}