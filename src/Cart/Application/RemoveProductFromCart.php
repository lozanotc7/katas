<?php

namespace Katas\Cart\Application;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\CartRepository;
use Katas\Cart\Domain\Product;

class RemoveProductFromCart
{
    public function __construct(private CartRepository $cartRepository)
    {
    }

    public function __invoke(Product $product, Cart $cart)
    {
        $cart->products->remove($product);
        $this->cartRepository->update($cart);

        // throw new RemovedProductFromCart Event
    }
}
