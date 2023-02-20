<?php

namespace App\VtexClient\Model;

class Item
{
    public string $id;
    public string $qty;

    public static function fromArray(array $data): self
    {
        $self = new self();
        $self->id = $data['items.id'];
        $self->qty = $data['items.quantity'];

        return $self;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->qty
        ];
    }
}