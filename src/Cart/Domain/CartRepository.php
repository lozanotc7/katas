<?php

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

interface CartRepository
{
    public function find(Uuid $uuid): Cart;
    public function save(Cart $cart): void;
    public function update(Cart $cart): void;
}
