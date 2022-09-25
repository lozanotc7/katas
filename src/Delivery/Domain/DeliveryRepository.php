<?php

namespace Katas\Delivery\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

interface DeliveryRepository
{
    public function find(Uuid $uuid): Delivery;
    public function save(Delivery $delivery): void;
    public function update(Delivery $delivery): void;
}
