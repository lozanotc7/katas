<?php

namespace Katas\Cart\Infrastructure;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\CartRepository;
use Katas\Cart\Domain\Product;
use Katas\Cart\Domain\ProductsOnCart;
use Katas\Shared\Domain\ValueObjects\Uuid;

class InMemoryCartRepository implements CartRepository
{
    private array $carts;

    public function __construct()
    {
        $this->carts = [
            new Cart(
                new Uuid('aaaa-aaaa-aaaa-aaaa'),
        'First cart',
                new ProductsOnCart(
                    new Product(new Uuid('690ae5a0-1a57-4549-b480-917c774aad2b'), "first product", 111.11),
                    new Product(new Uuid('d6d494cf-638e-479d-a1aa-b47a1fedbd7c'), "second product", 222.22),
                    new Product(new Uuid('ac16cb1b-654f-4c8e-8a65-a591c985fc18'), "third product", 333.33),
                )),
            new Cart(),
            new Cart(),
        ];
    }

    public function find(Uuid $uuid): Cart
    {
        // TODO: Implement find() method.
    }

    public function save(Cart $cart): void
    {
        // TODO: Implement save() method.
    }

    public function update(Cart $cart): void
    {
        // TODO: Implement update() method.
    }
}
