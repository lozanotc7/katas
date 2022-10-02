<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\Aggregate\AggregateRoot;
use Katas\Shared\Domain\ValueObjects\Uuid;

class Cart extends AggregateRoot
{
    public function __construct(
        public readonly Uuid $id,
        public readonly ProductsOnCart $products,
        public readonly User $user,
    ) {
    }

    public static function new(
        Uuid $id,
        ProductsOnCart $productsOnCart,
        User $user
    ) {
        $cart = new self($id, $productsOnCart, $user);

        $cart->record(
            new CartCreatedDomainEvent($id->value(), $productsOnCart->productsIds(), $user->id->value())
        );

        return $cart;
    }

    public function to_array()
    {
        return [
            'id'          => $this->id,
            'productsIds' => $this->products->productsIds(),
        ];
    }
}
