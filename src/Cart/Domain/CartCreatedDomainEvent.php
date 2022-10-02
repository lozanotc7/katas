<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\Events\DomainEvent;

final class CartCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        public readonly string $name,
        public readonly array $productsIds,
        public readonly string $userId,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'cart.created';
    }

    public function toPrimitives(): array
    {
        return [
            'name'        => $this->name,
            'productsIds' => $this->productsIds,
            'userId'      => $this->userId,
        ];
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['productsIds'], $body['userId'], $eventId, $occurredOn);
    }
}
