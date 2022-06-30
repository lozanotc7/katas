<?php

namespace Katas\GildedRose\Items\Domain;

use Katas\GildedRose\Items\Domain\ValueObjects\QualityInterface;

interface updatableItems
{
    public function __construct(string $name, int $sell_in, QualityInterface $quality);
    public function name(): string;
    public function sell_in(): int;
    public function quality(): QualityInterface;
    public function update():void;
}
