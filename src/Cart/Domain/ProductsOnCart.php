<?php

namespace Katas\Cart\Domain;

class ProductsOnCart
{
    private array $products;

    public function __construct(Product ...$products)
    {
        $this->maxThreeProdductsCheck($products);
    }

    public function count(): int
    {
        return count($this->products);
    }

    public function add(Product $product): void
    {
        if ($this->count() >= 3) {
            throw new \Exception('3 products maximum.');
        }

        $this->products[] = $product;

        // create added product event
    }

    public function remove(Product $product): void
    {
        $this->product = array_diff($this->products, [ $product ]);
    }

    public function productsIds(): array
    {
        return array_map(fn($product) => $product->id, $this->products);
    }

    private function maxThreeProdductsCheck(array $products): void
    {
        if (count($products) > 3) {
            throw new \Exception('3 products maximum.');
        }
    }
}
