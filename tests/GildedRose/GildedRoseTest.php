<?php

declare(strict_types=1);

namespace Katas\Tests\GildedRose;

use Katas\GildedRose\GildedRose;
use Katas\GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    private array $items;
    private GildedRose $gildedRose;

    public function setUp(): void
    {
        $this->items = [
            // name, sellIn, quality
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 3, 6),
        ];

        $this->gildedRose = new GildedRose($this->items);
    }

    public function testDay0():void
    {
        $expected = [
            '+5 Dexterity Vest, 10, 20',
            'Aged Brie, 2, 0',
            'Elixir of the Mongoose, 5, 7',
            'Sulfuras, Hand of Ragnaros, 0, 80',
            'Sulfuras, Hand of Ragnaros, -1, 80',
            'Backstage passes to a TAFKAL80ETC concert, 15, 20',
            'Backstage passes to a TAFKAL80ETC concert, 10, 49',
            'Backstage passes to a TAFKAL80ETC concert, 5, 49',
            'Conjured Mana Cake, 3, 6',
        ];

        $this->assertEquals(array_map(fn ($item) => "$item", $this->items), $expected);
    }
}
