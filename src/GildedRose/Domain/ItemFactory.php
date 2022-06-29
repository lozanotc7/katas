<?php

namespace Katas\GildedRose\Domain;

class ItemFactory
{
    private function __construct()
    {
    }

    public static function create(string $name, int $sell_in, int $quality)
    {
        return match ($name) {
            'Aged Brie'                                 => new AgedBrieItem($sell_in, $quality),
            'Sulfuras, Hand of Ragnaros'                => new SulfurasItem($sell_in, $quality),
            'Backstage passes to a TAFKAL80ETC concert' => new TicketItem($sell_in, $quality),
            'Conjured Mana Cake'                        => new ConjuredItem($sell_in, $quality),
            default                                     => new StandardItem($name, $sell_in, $quality),
        };
    }
}
