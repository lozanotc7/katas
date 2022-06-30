<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;

abstract class BaseStandardItem extends BaseItem
{
    public function __construct(protected string $name, protected int $sell_in, protected QualityInterface $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }
}
