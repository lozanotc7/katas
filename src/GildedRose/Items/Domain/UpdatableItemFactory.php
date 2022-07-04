<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Item;
use Katas\GildedRose\Items\Domain\ValueObjects\LegendaryQuality;
use Katas\GildedRose\Items\Domain\ValueObjects\StandardQuality;

class UpdatableItemFactory
{
    private function __construct()
    {
    }

    public static function create(Item $item)
    {
        return match ($item->name) {
            'Aged Brie'                                 => new AgedBrieItem($item),
            'Sulfuras, Hand of Ragnaros'                => new SulfurasItem($item),
            'Backstage passes to a TAFKAL80ETC concert' => new TicketItem($item),
            'Conjured Mana Cake'                        => new ConjuredItem($item),
            default                                     => new StandardItem($item),
        };
    }
}
