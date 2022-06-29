<?php

namespace Katas\GildedRose\Domain;

class AgedBrieItem
{
    public string $name = 'Aged Brie';

    public function __construct(public int $sell_in, public int $quality)
    {
        if($this->quality < 0){
            $this->quality = 0;
        } elseif ($this->quality > 50) {
            $this->quality = 50;
        }
    }

    public function update()
    {
        $this->sell_in--;

        if ($this->quality == 50) {
            $this->quality = 50;
        } elseif ($this->sell_in >= 0) {
            $this->quality += 1;
        } else {
            $this->quality += 2;
        }
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
