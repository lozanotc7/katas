<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Item;
use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;

abstract class BaseItem implements updatableItems
{
    public function __construct(protected string $name, protected int $sell_in, protected QualityInterface $quality)
    {
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality->value()}";
    }

    public function name(): string
    {
        return $this->name;
    }

    public function sell_in(): int
    {
        return $this->sell_in;
    }

    public function quality(): QualityInterface
    {
        return $this->quality;
    }
}
