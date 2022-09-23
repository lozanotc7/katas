<?php

declare(strict_types=1);

namespace Katas\Shared\Domain\ValueObjects;

final class Address
{
    public function __construct(
        public readonly string $region,
        public readonly string $city,
        public readonly string $postalCode, // should be a ValueObject for format checking
        public readonly string $street, // can be a ValueObject
        public readonly int $number,
        public readonly ?int $floor = null,
        public readonly ?string $door = null
    ) {
    }
}
