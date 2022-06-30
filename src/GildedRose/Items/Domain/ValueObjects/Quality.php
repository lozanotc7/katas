<?php

namespace Katas\GildedRose\Items\Domain\ValueObjects;

use Katas\Shared\Domain\ValueObjects\IntegerValueObject;

abstract class Quality extends IntegerValueObject implements QualityInterface
{
    public function __construct(protected int $value)
    {
        parent::__construct($value);

        $this->value = $this->normalize($this->value);
    }

    private function normalize(int $value):int
    {
        if($value < static::MIN) return static::MIN;
        if($value > static::MAX) return static::MAX;

        return $value;
    }
}
