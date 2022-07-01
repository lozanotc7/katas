<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Item;
use Katas\GildedRose\Items\Domain\ValueObjects\LegendaryQuality;
use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;

class SulfurasItem extends BaseItem
{
    public function __construct(protected Item $item)
    {
        parent::__construct($item);
    }

    public function qualityType(int $quality): QualityInterface
    {
        return new LegendaryQuality($quality);
    }

    public function update(): void
    {
        // don't change
    }
}
