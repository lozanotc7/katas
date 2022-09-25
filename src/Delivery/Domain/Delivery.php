<?php

declare(strict_types=1);

namespace Katas\Delivery\Domain;

use Katas\Shared\Domain\ValueObjects\Address;
use Katas\Shared\Domain\ValueObjects\Uuid;

class Delivery
{
    /**
     * @throws \Exception
     */
    public function __construct(
        public readonly Uuid $id,
        public readonly array $productIds,
        private Address $address,
        private bool $confirmed = false
    ) {
        $this->maxThreeProdductsCheck($productIds);
    }

    public static function new(Uuid $id, array $productsIds, Address $address)
    {
        $delivery = new self($id, $productsIds, $address);

        return $delivery;
    }

    public function isConfirmed()
    {
        return $this->confirmed;
    }

    public function confirm()
    {
        $this->confirmed = true;
    }

    public function address()
    {
        return $this->address;
    }

    public function setAddress(Address $address)
    {
        $this->guardCantChangeConfirmedDeliveryAddress();

        $this->address = $address;
    }

    private function maxThreeProdductsCheck(array $productIds): void
    {
        if (count($productIds) > 3) {
            throw new \Exception('3 products maximum.');
        }
    }

    private function guardCantChangeConfirmedDeliveryAddress()
    {
        if($this->isConfirmed()){
            throw new \Exception("Can't change already confirmed delivery address");
        }
    }
}
