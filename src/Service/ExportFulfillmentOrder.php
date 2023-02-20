<?php

namespace App\Service;

use App\ContainerApi\ContainerApiInterface;
use App\Repository\FulfillmentOrderRepo;
use App\VtexClient\MarketplaceApi;
use App\VtexClient\Model\FulfillmentOrder;
use App\VtexClient\Model\Item;

class ExportFulfillmentOrder
{
    public function __construct(
        private MarketplaceApi        $marketplaceApi,
        private ContainerApiInterface $containerApi,
        private string                $accountName,
        private FulfillmentOrderRepo  $fulfillmentOrderRepo,
    )
    {
    }

    public function fulfillOrders(): void
    {
        $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Starting export of the marketplaces orders for ' . $this->accountName);

        while(($data = $this->containerApi->readFromInput()) !== []) {
            $orderId = $data['marketplaceOrderId'];

            if(!$this->fulfillmentOrderRepo->hasFulfillmentOrder($orderId)) {
                $order = FulfillmentOrder::fromArray($data);
                $this->fulfillmentOrderRepo->saveFulfillmentOrder($orderId, $order);
            }
            else{
                $order = $this->fulfillmentOrderRepo->getFulfillmentOrder($orderId);
            }

            $order->addItem(Item::fromArray($data));
        }

        /** @var FulfillmentOrder $order */
        foreach ($this->fulfillmentOrderRepo->getAllOrders() as $order){
            $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Exporting markerOrderId = ' . $order->marketplaceOrderId);
            $this->marketplaceApi->placeFulfillmentOrder($order);
        }

        $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_SUCCESS, 'Finished export');
    }
}