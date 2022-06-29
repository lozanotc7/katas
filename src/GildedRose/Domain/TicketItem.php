<?php

namespace Katas\GildedRose\Domain;

class TicketItem
{
    public string $name = 'Backstage passes to a TAFKAL80ETC concert';

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

        if ($this->sell_in < 0) {
            $this->quality = 0;
        } elseif ($this->sell_in < 5) {
            $this->quality += 3;
        } elseif ($this->sell_in < 10) {
            $this->quality += 2;
        } else {
            $this->quality++;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
