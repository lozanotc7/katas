<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

class Cart
{
    public function __construct(
        public readonly Uuid $id,
        public readonly string $name,
        public readonly ProductsOnCart $products
    ) {
    }

    public static function new(
        Uuid $id,
        string $name,
        ProductsOnCart $productsOnCart
    ) {
        $cart = new self($id, $name, $productsOnCart);

        // throw new Cart Event

        return $cart;
    }
}
