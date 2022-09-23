<?php

namespace Katas\Tests\Cart\Domain;

use Katas\Cart\Domain\Product;
use Katas\Shared\Domain\ValueObjects\Uuid;

class ProductMother
{
    public static function create(
        ?Uuid $id = null,
        ?string $name = null,
        ?float $price = null
    ): Product {
        return new Product(
            $id ?? Uuid::new(),
            $name ?? md5(rand(1,500)),
            $price ?? rand(10,1000)/10
        );
    }
}
