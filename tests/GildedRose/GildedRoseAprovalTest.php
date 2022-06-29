<?php

declare(strict_types=1);

namespace Katas\Tests\GildedRose;

use Katas\GildedRose\Domain\AgedBrieItem;
use Katas\GildedRose\Domain\ConjuredItem;
use Katas\GildedRose\Domain\StandardItem;
use Katas\GildedRose\Domain\SulfurasItem;
use Katas\GildedRose\Domain\TicketItem;
use Katas\GildedRose\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseAprovalTest extends TestCase
{
    private array $items;
    private GildedRose $gildedRose;
    private $expected;

    public function setUp(): void
    {
        $this->items = [
            // name, sellIn, quality
            new StandardItem('+5 Dexterity Vest', 10, 20),
            new AgedBrieItem( 2, 0),
            new StandardItem('Elixir of the Mongoose', 5, 7),
            new SulfurasItem( 0, 80),
            new SulfurasItem( -1, 80),
            new TicketItem(15, 20),
            new TicketItem(10, 49),
            new TicketItem(5, 49),
            new ConjuredItem(3, 6),
        ];

        // Class instance
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
