<?php

declare(strict_types=1);

namespace Katas\GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        array_walk(
            $items,
            function ($item) {
                if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                    $item->quality = 80;
                } elseif ($item->quality > 50) {
                    $item->quality = 50;
                }
            },
        );

        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if($item->name == 'Aged Brie'){
                $item->sell_in--;

                if ($item->quality == 50) {
                    $item->quality = 50;
                } elseif ($item->sell_in >= 0) {
                    $item->quality += 1;
                } else {
                    $item->quality += 2;
                }
            }elseif($item->name == 'Sulfuras, Hand of Ragnaros'){
                $item->quality = 80;
            }elseif($item->name == 'Backstage passes to a TAFKAL80ETC concert'){
                $item->sell_in--;

                if ($item->sell_in < 0) {
                    $item->quality = 0;
                } elseif ($item->sell_in < 5) {
                    if ($item->quality > 47) {
                        $item->quality = 50;
                    } else {
                        $item->quality += 3;
                    }
                } elseif ($item->sell_in < 10) {
                    if ($item->quality > 48) {
                        $item->quality = 50;
                    } else {
                        $item->quality += 2;
                    }
                } else {
                    if ($item->quality > 49) {
                        $item->quality = 50;
                    } else {
                        $item->quality++;
                    }
                }
            }else{
                $item->sell_in--;

                if($item->quality != 0){
                    $item->quality--;
                }
                
                if ($item->sell_in < 0 && $item->quality != 0) {
                    $item->quality--;
                }
            }
        }
    }
}
