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

    public function to_array()
    {
        return [
            "region" => $this->region,
            "city" => $this->city,
            "postalCode" => $this->postalCode,
            "street" => $this->street,
            "number" => $this->number,
            "floor" => $this->floor,
            "door" => $this->door,
        ];
    }

    public static function from_array($array)
    {
        return new self(
            $array["region"],
            $array["city"],
            $array["postalCode"],
            $array["street"],
            $array["number"],
            $array["floor"],
            $array["door"],
        );
    }
}
