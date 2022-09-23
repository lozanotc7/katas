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

        // throw finished cart event

        return $finishedCart;
    }
}
