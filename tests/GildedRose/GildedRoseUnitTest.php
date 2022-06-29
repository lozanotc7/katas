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

class GildedRoseUnitTest extends TestCase
{
    public function test_Mandatory_Items(): void
    {
        $this->expectException(\ArgumentCountError::class);

        /** @noinspection PhpParamsInspection */
        /** @SuppressWarnings */
        new GildedRose();
    }

    public function test_normal_item(): void
    {
        $item = new StandardItem('new item', 10, 20);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(19, $item->quality);
    }

    public function test_normal_item_quality_dont_decreases_below_0(): void
    {
        $item = new StandardItem('new item', 10, 0);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(0, $item->quality);
    }

    public function test_normal_item_quality_decreases_double_after_sell_in_below_0(): void
    {
        $item = new StandardItem('new item', 0, 10);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(8, $item->quality);
    }

    public function test_aged_brie(): void
    {
        $item = new AgedBrieItem( 10, 20);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(21, $item->quality);
    }

    public function test_aged_brie_quality_increases_double_after_sell_in_below_0(): void
    {
        $item = new AgedBrieItem(0, 20);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(22, $item->quality);
    }

    public function test_aged_brie_quality_dont_increases_over_50(): void
    {
        $item = new AgedBrieItem( 10, 50);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(50, $item->quality);
    }

    public function test_sulfuras_dont_decreases(): void
    {
        $item = new SulfurasItem(10, 80);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(10, $item->sell_in);
        $this->assertEquals(80, $item->quality);
    }

    public function test_sulfuras_quality_80(): void
    {
        $item = new SulfurasItem(10, 20);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(80, $item->quality);
    }

    public function test_tickets():void
    {
        $item = new TicketItem(20, 30);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(19, $item->sell_in);
        $this->assertEquals(31, $item->quality);
    }

    public function test_tickets_quality_doubles_bellow_10_days():void
    {
        $item = new TicketItem( 10, 30);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(32, $item->quality);
    }

    public function test_tickets_quality_triples_bellow_5_days():void
    {
        $item = new TicketItem(5, 30);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(33, $item->quality);
    }

    public function test_tickets_quality_is_0_after_sell_in():void
    {
        $item = new TicketItem(0, 30);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(0, $item->quality);
    }

    public function test_conjured_quality_decreases_double():void
    {
        $item = new ConjuredItem(10, 30);

        $gildedRose = new GildedRose([ $item ]);

        $gildedRose->updateQuality();

        $this->assertEquals(28, $item->quality);
    }
}
