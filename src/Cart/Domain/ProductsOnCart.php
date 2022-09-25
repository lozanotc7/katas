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

        // throw added product event
    }

    public function remove(Product $product): void
    {
        $initialCount = $this->count();

        $this->product = array_diff($this->products, [ $product ]);
    }

    public function productsIds()
    {
        return array_walk($this->products, fn($product) => $product->id);
    }

    private function maxThreeProdductsCheck(array $products): void
    {
        if (count($products) > 3) {
            throw new \Exception('3 products maximum.');
        }
    }
}
