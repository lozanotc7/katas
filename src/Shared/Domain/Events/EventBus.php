<?php

declare(strict_types=1);

namespace Katas\Shared\Domain\Events;

interface EventBus
{
    public function publish(DomainEvent ...$events): void;
}
