<?php

namespace Katas\Cart\Application;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\CartRepository;
use Katas\Cart\Domain\ProductsOnCart;
use Katas\Cart\Domain\User;
use Katas\Cart\Domain\UserRepository;
use Katas\Shared\Domain\Events\EventBus;
use Katas\Shared\Domain\ValueObjects\Uuid;

class NewUserActiveCart
{
    public function __construct(private CartRepository $cartRepository, private UserRepository $userRepository, private readonly EventBus $bus)
    {
    }

    public function __invoke(Uuid $id, string $name, User $user)
    {
        $cart = Cart::new(
            $id,
            $name,
            new ProductsOnCart(),
            $user
        );

        $user->setActiveCart($cart);

        $this->cartRepository->save($cart);
        $this->userRepository->update($user);

        // throw new Cart Event
        $this->bus->publish(...$cart->pullDomainEvents());
    }
}
