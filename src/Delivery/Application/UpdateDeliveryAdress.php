<?php

namespace Katas\Delivery\Application;

use Katas\Delivery\Domain\Delivery;
use Katas\Delivery\Domain\DeliveryRepository;
use Katas\Shared\Domain\ValueObjects\Address;

class UpdateDeliveryAdress
{
    public function __construct(private DeliveryRepository $deliveryRepository) {}

    public function __invoke(Delivery $delivery, Address $newAddress)
    {
        $delivery->setAddress($newAddress);

        $this->deliveryRepository->update($delivery);

        // throw updated delivery address event
    }
}
