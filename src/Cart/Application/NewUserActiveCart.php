<?php

namespace Katas\Cart\Application;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\CartRepository;
use Katas\Cart\Domain\FinishedCartRepository;
use Katas\Cart\Domain\User;
use Katas\Shared\Domain\ValueObjects\Address;
use Katas\Shared\Domain\ValueObjects\Uuid;

class NewActiveCart
{
    public function __construct()
    {
    }

    public function __invoke(Uuid $id, User $user)
    {
        $cart = Cart::new(
            $id,

        );
    }
}
