<?php

namespace Katas\Cart\Application;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\CartRepository;
use Katas\Cart\Domain\Product;
use Katas\Cart\Domain\ProductRepository;
use Katas\Shared\Domain\ValueObjects\Uuid;

class AddProductToCartFromUuids
{
    public function __construct(private ProductRepository $productRepository, private CartRepository $cartRepository)
    {
    }

    public function __invoke(string $productId, string $cartId)
    {
        $product = $this->productRepository->find(new Uuid($productId));
        $cart    = $this->cartRepository->find(new Uuid($cartId));

        (new AddProductToCart($this->cartRepository))(
            $product,
            $cart
        );
    }
}
