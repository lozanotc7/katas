<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

class FinishedCarts
{
    public readonly array $carts;

    public function __construct(FinishedCart ... $carts) {
    }
}
