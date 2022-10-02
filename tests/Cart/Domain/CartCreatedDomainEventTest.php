<?php

namespace Katas\Tests\Cart\Domain;

use Katas\Cart\Domain\CartCreatedDomainEvent;
use Katas\Shared\Domain\ValueObjects\Uuid;
use PHPUnit\Framework\TestCase;

class CartCreatedDomainEventTest extends TestCase
{

    public function testFromPrimitives()
    {
        $event = CartCreatedDomainEvent::fromPrimitives(
            'aggregateId',
            $this->randPrimitives(),
            'EventId',
            'Ocurred on test'
        );

        self::assertIsObject($event);
    }

    public function testToPrimitives()
    {
        $primitives =$this->randPrimitives();

        $event = CartCreatedDomainEvent::fromPrimitives(
            'aggregateId',
            $primitives,
            'EventId',
            'Ocurred on test'
        );

        self::assertEquals($primitives, $event->toPrimitives());
    }

    public function testEventName()
    {
        self::assertEquals('cart.created', CartCreatedDomainEvent::eventName());
    }

    private function randPrimitives()
    {
        return [
            'productsIds' => [Uuid::new(),Uuid::new(),Uuid::new()],
            'userId' => Uuid::new(),
        ];
    }
}
