<?php

namespace Katas\GildedRose\Domain;

class SulfurasItem
{
    public string $name = 'Sulfuras, Hand of Ragnaros';

    public function __construct(public int $sell_in, public int $quality)
    {
        $this->quality = 80;
    }

    public function update()
    {
        // don't change
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
