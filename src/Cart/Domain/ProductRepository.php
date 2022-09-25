<?php

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

interface ProductRepository
{
    public function find(Uuid $uuid): Product;

    public function save(Product $user): void;

    public function update(Product $user): void;
}
