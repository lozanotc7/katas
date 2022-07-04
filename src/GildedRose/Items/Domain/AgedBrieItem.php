<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;
use Katas\GildedRose\Items\Domain\ValueObjects\StandardQuality;

class AgedBrieItem extends BaseStandardItem
{
    public function update(): void
    {
        $this->sell_in--;
        $this->quality = ($this->sell_in >= 0)
            ? new StandardQuality($this->quality->value() + 1)
            : new StandardQuality($this->quality->value() + 2);
    }
}
