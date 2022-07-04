<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Item;

interface updatableItems
{
    public function __construct(Item $item);

    public function update(): void;

    public function item(): Item;
}
