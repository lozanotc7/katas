<?php

namespace Katas\Tests\Delivery;

use Katas\Delivery\Domain\Delivery;
use Katas\Shared\Domain\ValueObjects\Address;
use Katas\Shared\Domain\ValueObjects\Uuid;
use PHPUnit\Framework\TestCase;

class DeliveryTest extends TestCase
{
    public function testMax3Products()
    {
        $addressMock = $this->createMock(Address::class);
        $products = [
            Uuid::new(), // 1
            Uuid::new(), // 2
            Uuid::new(), // 3
            Uuid::new()  // too many
        ];

        $this->expectException(\Exception::class);

        Delivery::new(
            Uuid::new(),
            $products,
            $addressMock
        );
    }
}
