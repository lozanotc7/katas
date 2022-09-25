<?php

namespace Katas\Cart\Application;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\CartRepository;
use Katas\Cart\Domain\Product;

class AddProductToCart
{
    public function __construct(private CartRepository $cartRepository)
    {
    }

    public function __invoke(Product $product, Cart $cart)
    {
        $cart->products->add($product);
        $this->cartRepository->update($cart);

        // throw new Product added Event
    }
}
