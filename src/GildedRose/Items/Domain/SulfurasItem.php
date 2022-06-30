<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Items\Domain\ValueObjects\LegendaryQuality;
use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;

class SulfurasItem extends BaseItem
{
    public function __construct(protected string $name, protected int $sell_in, protected QualityInterface $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update():void
    {
        // don't change
    }
}
