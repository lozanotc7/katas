<?php

declare(strict_types=1);

namespace Katas\Shared\Domain\Events;

use Katas\Shared\Domain\ValueObjects\Uuid;
use DateTimeImmutable;

abstract class DomainEvent
{
    private readonly string $eventId;
    private readonly string $occurredOn;

    public function __construct(private readonly string $aggregateId, string $eventId = null, string $occurredOn = null)
    {
        $this->eventId    = $eventId ?: Uuid::new()->value();
        $this->occurredOn = $occurredOn ?: (new DateTimeImmutable())->format('Y-m-d H:i:s');
    }

    abstract public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): self;

    abstract public static function eventName(): string;

    abstract public function toPrimitives(): array;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }
}
