<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Items\Domain\ValueObjects\StandardQuality;

class ConjuredItem extends BaseStandardItem
{
    public function update(): void
    {
        $this->sell_in--;
        $this->quality = new StandardQuality($this->quality->value() - 2);
    }
}
