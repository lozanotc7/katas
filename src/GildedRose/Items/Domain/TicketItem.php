<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Items\Domain\ValueObjects\StandardQuality;

class TicketItem extends BaseStandardItem
{
    public function update(): void
    {
        $this->sell_in--;
        if ($this->sell_in < 0) {
            $this->quality = new StandardQuality(0);
        } elseif ($this->sell_in < 5) {
            $this->quality = new StandardQuality($this->quality->value() + 3);
        } elseif ($this->sell_in < 10) {
            $this->quality = new StandardQuality($this->quality->value() + 2);
        } else {
            $this->quality = new StandardQuality($this->quality->value() + 1);
        }
    }
}
