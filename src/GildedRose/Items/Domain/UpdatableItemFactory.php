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
            'Aged Brie'                                 => new AgedBrieItem($item->name, $item->sell_in, new StandardQuality($item->quality)),
            'Sulfuras, Hand of Ragnaros'                => new SulfurasItem($item->name, $item->sell_in, new LegendaryQuality($item->quality)),
            'Backstage passes to a TAFKAL80ETC concert' => new TicketItem($item->name, $item->sell_in, new StandardQuality($item->quality)),
            'Conjured Mana Cake'                        => new ConjuredItem($item->name, $item->sell_in, new StandardQuality($item->quality)),
            default                                     => new StandardItem($item->name, $item->sell_in, new StandardQuality($item->quality)),
        };
    }
}
