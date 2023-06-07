<?php

namespace App\VtexClient\Model;

class Product
{
    public int $id;
    public string $refId;
    public string $linkId;
    public array $data;

    public function toJson()
    {
        return json_encode($this->data);
    }

    public static function getData()
    {
        $self = new self();
        return $self->data;
    }

    public static function fromArray($product): self
    {
        $self = new self;
        $self->refId = $product['RefId'];
        $self->linkId = $product['LinkId'];
        $self->data = $product;

        return $self;
    }

}