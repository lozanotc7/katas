<?php

namespace Katas\GildedRose\Domain;

class ConjuredItem
{
    public string $name = 'Conjured Mana Cake';

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

        $this->quality--;
        $this->quality--;

        if($this->quality <= 0){
            $this->quality = 0;
        }
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
