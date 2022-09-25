<?php

namespace Katas\Delivery\Application;

use Katas\Cart\Domain\Cart;
use Katas\Cart\Domain\FinishedCart;
use Katas\Delivery\Domain\Delivery;
use Katas\Delivery\Domain\DeliveryRepository;
use Katas\Shared\Domain\ValueObjects\Address;
use Katas\Shared\Domain\ValueObjects\Uuid;

class NewDeliveryFromFinishedCart
{
    public function __construct(private DeliveryRepository $deliveryRepository)
    {
    }

    public function __invoke(Uuid $id, string $finishedCartEvent)
    {
        $json        = json_decode($finishedCartEvent);

        $delivery = Delivery::new(
            $id,
            $json['cart']['productsIds'],
            Address::from_array($json['address'])
        );

        $this->deliveryRepository->save($delivery);

        // throw new delivery event
    }
}
