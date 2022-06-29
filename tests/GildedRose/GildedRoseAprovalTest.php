<?php

declare(strict_types=1);

namespace Katas\Tests\GildedRose;

use Katas\GildedRose\Domain\ItemFactory;
use Katas\GildedRose\GildedRose;
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
            ItemFactory::create('+5 Dexterity Vest', 10, 20),
            ItemFactory::create('Aged Brie', 2, 0),
            ItemFactory::create('Elixir of the Mongoose',5, 7),
            ItemFactory::create('Sulfuras, Hand of Ragnaros',0, 80),
            ItemFactory::create('Sulfuras, Hand of Ragnaros',-1, 80),
            ItemFactory::create('Backstage passes to a TAFKAL80ETC concert',15, 20),
            ItemFactory::create('Backstage passes to a TAFKAL80ETC concert',10, 49),
            ItemFactory::create('Backstage passes to a TAFKAL80ETC concert',5, 49),
            ItemFactory::create('Conjured Mana Cake', 3, 6),
        ];

        $this->gildedRose = new GildedRose($this->items);

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
        $day = 1;
        while ($day <= 30) {
            $this->gildedRose->updateQuality();
            $expected = $this->expected[ $day ];
            $this->assertEquals(array_map(fn($item) => "$item", $this->items), $expected);
            $day += 1;
        }
    }
}
