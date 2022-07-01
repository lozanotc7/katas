<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Item;
use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;
use Katas\GildedRose\Items\Domain\ValueObjects\StandardQuality;

abstract class BaseStandardItem extends BaseItem
{
    public function __construct(protected Item $item)
    {
        parent::__construct($item);
    }

    public function qualityType(int $quality): QualityInterface
    {
        return new StandardQuality($quality);
    }
}

