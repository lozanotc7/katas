<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

final class User
{
    public function __construct(
        public readonly Uuid $id,
        public readonly string $name,
        public readonly FinishedCarts $finishedCarts,
        private ?Cart $activeCart = null
    ) {
    }

    public function activeCart()
    {
        return $this->activeCart;
    }

    public function setActiveCart (Cart $cart) {
        $this->activeCart = $cart;
    }

    public function clearActiveCart () {
        $this->activeCart = null;
    }
}
