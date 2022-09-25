<?php

namespace Katas\Cart\Application;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\FinishedCart;
use Katas\Cart\Domain\FinishedCartRepository;
use Katas\Cart\Domain\UserRepository;
use Katas\Shared\Domain\ValueObjects\Address;
use Katas\Shared\Domain\ValueObjects\Uuid;

class FinishCart
{
    public function __construct(private UserRepository $userRepository, private FinishedCartRepository $finishedCartRepository)
    {
    }

    public function __invoke(Uuid $id, Cart $cart, Address $deliveryAddress)
    {
        $this->guardIsActiveCart($cart);

        $finishedCart = FinishedCart::finish(
            $id,
            $cart,
            $deliveryAddress
        );

        $user = $cart->user;
        $user->clearActiveCart();

        $this->userRepository->update($user);
        $this->finishedCartRepository->save($finishedCart);

        // $finishedCartEvent = $finishedCart->jsonSerialization();
        // throw finished cart event ($finishedCartEvent)
    }

    private function guardIsActiveCart(Cart $cart)
    {
        if($cart->user->activeCart() !== $cart) {
            throw new \Exception('This is not the active cart');
        }
    }
}
