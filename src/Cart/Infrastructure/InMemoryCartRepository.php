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
                    new Product(new Uuid('1111-1111'))
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
