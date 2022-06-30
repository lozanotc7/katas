<?php

declare(strict_types=1);

namespace Katas\Tests\GildedRose;

use Katas\GildedRose\GildedRose;
use Katas\GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseAprovalTest extends TestCase
{
    private array $items;
    private GildedRose $gildedRose;
    private array $expected;

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

        $this->gildedRose = new GildedRose(...$this->items);

        // load from file to improve readability
        $this->expected = json_decode(file_get_contents('TestFixture/json_expected_fixture.json'), true);
    }

    public function test_Day_0(): void
    {
        $expected = $this->expected[0];

        $this->assertEquals(array_map(fn($item) => "$item", $this->items), $expected);
    }

    public function test_Days_1_to_30(): void
    {
        for ($day = 1; $day <= 30; ++$day) {
            $this->gildedRose->updateQuality();
            $expected = ($this->expected)[ $day ];
            $this->assertEquals(array_map(fn($item) => "$item", $this->gildedRose->items()), $expected);
        }
    }
}
