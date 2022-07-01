<?php

declare(strict_types=1);

namespace Katas\Tests\GildedRose;

use Katas\GildedRose\GildedRose;
use Katas\GildedRose\Item;
use Katas\GildedRose\Items\Domain\UpdatableItemFactory;
use PHPUnit\Framework\TestCase;

class GildedRoseUnitTest extends TestCase
{
    public function test_empty_instance(): void
    {
        $this->assertInstanceOf(GildedRose::class, (new GildedRose()));
    }

    public function test_normal_item(): void
    {
        $item       = new Item('+5 Dexterity Vest', 10, 20);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(9, $gildedRose->items()[0]->sell_in);
        $this->assertEquals(19, $gildedRose->items()[0]->quality);
    }

    public function test_normal_item_quality_dont_decreases_below_0(): void
    {
        $item       = new Item('+5 Dexterity Vest', 10, 0);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $gildedRose->items()[0]->quality);
    }

    public function test_normal_item_quality_decreases_double_after_sell_in_below_0(): void
    {
        $item       = new Item('+5 Dexterity Vest', 0, 10);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(8, $gildedRose->items()[0]->quality);
    }

    public function test_normal_item_max_quality()
    {
        $UpdatableItem = UpdatableItemFactory::create(new Item('Cool Item', 10, 100));

        $this->assertEquals(50, $UpdatableItem->item()->quality);
    }

    public function test_aged_brie(): void
    {
        $item       = new Item('Aged Brie', 10, 20);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(9, $gildedRose->items()[0]->sell_in);
        $this->assertEquals(21, $gildedRose->items()[0]->quality);
    }

    public function test_aged_brie_quality_increases_double_after_sell_in_below_0(): void
    {
        $item       = new Item('Aged Brie', 0, 20);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(22, $gildedRose->items()[0]->quality);
    }

    public function test_aged_brie_quality_dont_increases_over_50(): void
    {
        $item       = new Item('Aged Brie', 10, 50);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(50, $gildedRose->items()[0]->quality);
    }

    public function test_aged_brie_item_max_quality()
    {
        $updatableItem = UpdatableItemFactory::create(new Item('Aged Brie', 10, 100));

        $this->assertEquals(50, $updatableItem->item()->quality);
    }

    public function test_sulfuras_dont_decreases(): void
    {
        $item       = new Item('Sulfuras, Hand of Ragnaros', 10, 80);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(10, $gildedRose->items()[0]->sell_in);
        $this->assertEquals(80, $gildedRose->items()[0]->quality);
    }

    public function test_sulfuras_quality_80(): void
    {
        $item       = new Item('Sulfuras, Hand of Ragnaros', 10, 20);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(80, $gildedRose->items()[0]->quality);
    }

    public function test_sulfuras_item_max_quality()
    {
        $UpdatableItem = UpdatableItemFactory::create(new Item('Sulfuras, Hand of Ragnaros', 10, 100));

        $this->assertEquals(80, $UpdatableItem->item()->quality);
    }

    public function test_tickets(): void
    {
        $item       = new Item('Backstage passes to a TAFKAL80ETC concert', 20, 30);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(19, $gildedRose->items()[0]->sell_in);
        $this->assertEquals(31, $gildedRose->items()[0]->quality);
    }

    public function test_tickets_quality_doubles_bellow_10_days(): void
    {
        $item       = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 30);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(32, $gildedRose->items()[0]->quality);
    }

    public function test_tickets_quality_triples_bellow_5_days(): void
    {
        $item       = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 30);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(33, $gildedRose->items()[0]->quality);
    }

    public function test_tickets_quality_is_0_after_sell_in(): void
    {
        $item       = new Item('Backstage passes to a TAFKAL80ETC concert', 0, 30);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $gildedRose->items()[0]->quality);
    }

    public function test_tickets_brie_item_max_quality()
    {
        $UpdatableItem = UpdatableItemFactory::create(new Item('Backstage passes to a TAFKAL80ETC concert', 10, 100));

        $this->assertEquals(50, $UpdatableItem->item()->quality);
    }

    public function test_conjured_quality_decreases_double(): void
    {
        $item       = new Item('Conjured Mana Cake', 10, 30);
        $gildedRose = new GildedRose(...[ $item ]);
        $gildedRose->updateQuality();

        $this->assertEquals(28, $gildedRose->items()[0]->quality);
    }

    public function test_conjured_brie_item_max_quality()
    {
        $UpdatableItem = UpdatableItemFactory::create(new Item('Conjured Mana Cake', 10, 100));

        $this->assertEquals(50, $UpdatableItem->item()->quality);
    }

    public function test_negative_quality_is_zero()
    {
        $this->assertStringEndsWith(
            '0',
            (UpdatableItemFactory::create(new Item('+5 Dexterity Vest', 10, -20)))->__toString()
        );
        $this->assertStringEndsWith(
            '0',
            (UpdatableItemFactory::create(new Item('Aged Brie', 10, -20)))->__toString()
        );
        $this->assertStringEndsWith(
            '0',
            (UpdatableItemFactory::create(
                new Item('Backstage passes to a TAFKAL80ETC concert', 10, -20)
            ))->__toString()
        );
        $this->assertStringEndsWith(
            '0',
            (UpdatableItemFactory::create(
                new Item('Conjured Mana Cake', 10, -20)
            ))->__toString()
        );
    }
}
