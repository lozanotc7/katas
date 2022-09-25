<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

class Cart
{
    public function __construct(
        public readonly Uuid $id,
        public readonly string $name,
        public readonly ProductsOnCart $products,
        public readonly User $user,
    ) {
    }

    public static function new(
        Uuid $id,
        string $name,
        ProductsOnCart $productsOnCart,
        User $user
    ) {
        $cart = new self($id, $name, $productsOnCart, $user);

        return $cart;
    }

    public function to_array()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'productsIds' => $this->products->productsIds()
        ];
    }
}
