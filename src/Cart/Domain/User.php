<?php

declare(strict_types=1);

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

final class User
{
    public function __construct(
        public readonly Uuid $id,
        public readonly string $name,
        public readonly FinishedCarts $finishedCarts,
        public readonly ?Cart $activeCart = null
    ) {
    }
}
