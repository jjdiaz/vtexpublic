<?php

namespace App\Repository;

use App\VtexClient\Model\Product;

class ProductRepo
{
    private array $products = [];

    public function saveProduct(Product $product): void
    {
        $this->products[$product->refId] = $product;
    }

    public function getProduct(string $refId): Product
    {
        if($this->hasProduct($refId))
            return $this->products[$refId];

        throw new \Exception("Can not get non-existing product");
    }

    public function hasProduct(string $refId): bool
    {
        return array_key_exists($refId, $this->products);
    }

    public function getAllProducts(): array
    {
        return $this->products;
    }
}