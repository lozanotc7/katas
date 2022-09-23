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
        public readonly Address $address
    ) {
        $this->maxThreeProdductsCheck($productIds);
    }

    public static function new(Uuid $id, array $productsIds, Address $address)
    {
        $delivery = new self($id, $productsIds, $address);

        // throw new Delivery Event

        return $delivery;
    }

    private function maxThreeProdductsCheck(array $productIds): void
    {
        if(count($productIds) > 3){
            throw new \Exception('3 products maximum.');
        }
    }
}
