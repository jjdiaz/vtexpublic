<?php

namespace App\Service;

use App\ContainerApi\ContainerApiInterface;
use App\Repository\ProductRepo;
use App\VtexClient\MarketplaceApi;
use App\VtexClient\Model\Product;

class ExportCreateProduct
{
    public function __construct(
        private MarketplaceApi        $marketplaceApi,
        private ContainerApiInterface $containerApi,
        private string                $accountName,
        private ProductRepo           $productRepo
    )
    {
    }

    public function createProducts(): void
    {
        $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Starting export of the marketplaces products for ' . $this->accountName);

        while (($data = $this->containerApi->readFromInput()) !== []) {
            $refId = $data['RefId'];

            if(!$this->productRepo->hasProduct($refId)) {
                $product = Product::fromArray($data);
                $this->productRepo->saveProduct($product);
            }else{
                $product = $this->productRepo->getProduct($refId);
            }
        }
        /** @var Product $product */
        foreach ($this->productRepo->getAllProducts() as $product) {
            $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Exporting Product RefId = ' . $product->refId);
            $this->marketplaceApi->createProduct($product);
        }

        $this->containerApi->log(ContainerApiInterface::LOG_LEVEL_SUCCESS, 'Finished export');
    }
}