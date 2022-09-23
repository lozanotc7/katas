<?php

namespace Katas\Tests\Cart;

use Katas\Cart\Domain\ProductsOnCart;
use Katas\Tests\Cart\Domain\ProductMother;

use PHPUnit\Framework\TestCase;

class ProductsOnCartTest extends TestCase
{
    public function testMax3Products()
    {
        $this->expectException(\Exception::class);

        new ProductsOnCart(
            ProductMother::create(), // 1
            ProductMother::create(), // 2
            ProductMother::create(), // 3
            ProductMother::create()  // too many
        );
    }

    public function testRemoveOne()
    {
        $product = ProductMother::create();

        $productsOnCart = new ProductsOnCart($product);
        static::assertEquals(1, $productsOnCart->count());

        $productsOnCart->remove($product);
        static::assertEquals(0, $productsOnCart->count());
    }

    public function testRemoveInexistentDontCrash()
    {
        $product = ProductMother::create();

        $productsOnCart = new ProductsOnCart();
        $productsOnCart->remove($product);
        static::assertEquals(0, $productsOnCart->count());
    }

    public function testAdd()
    {
        $product = ProductMother::create();

        $productsOnCart = new ProductsOnCart();
        $productsOnCart->add($product);
        static::assertEquals(1, $productsOnCart->count());
    }
}
