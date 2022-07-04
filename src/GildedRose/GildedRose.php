<?php

declare(strict_types=1);

namespace Katas\GildedRose;

use Katas\GildedRose\Items\Domain\UpdatableItemFactory;

final class GildedRose
{
    private $items;

    public function __construct(Item ...$items)
    {
        $this->items = array_map(
            fn($item) => UpdatableItemFactory::create($item),
            $items
        );
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $item->update();
        }
    }

    public function items(): array
    {
        return array_map(
            fn($item) => $item->item(),
            $this->items
        );
    }
}
