<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Item;
use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;

abstract class BaseItem implements updatableItems
{
    protected string $name;
    protected int $sell_in;
    protected QualityInterface $quality;

    public function __construct(protected Item $item)
    {
        $this->name    = $item->name;
        $this->sell_in = $item->sell_in;
        $this->quality = $this->qualityType($item->quality);
    }

    abstract public function qualityType(int $quality): QualityInterface;

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality->value()}";
    }

    public function item(): Item
    {
        $this->item->name    = $this->name;
        $this->item->sell_in = $this->sell_in;
        $this->item->quality = $this->quality->value();

        return $this->item;
    }
}
