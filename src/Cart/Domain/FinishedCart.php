<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Address;
use Katas\Shared\Domain\ValueObjects\Uuid;

class FinishedCart
{
    public function __construct(
        public readonly Uuid $id,
        public readonly Cart $cart,
        public readonly Address $address
    ) {
    }

    public static function finish(Uuid $id, Cart $cart, Address $address): self
    {
        $finishedCart = new self($id, $cart, $address);

        return $finishedCart;
    }

    public function to_array()
    {
        return [
            "id"      => $this->id,
            "cart"    => $this->cart->to_array(),
            "address" => $this->address->to_array(),
        ];
    }

    public function jsonSerialization()
    {
        return json_encode(
            $this->to_array()
        );
    }
}
