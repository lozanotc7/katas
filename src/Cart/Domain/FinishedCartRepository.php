<?php

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

interface FinishedCartRepository
{
    public function find(Uuid $uuid): FinishedCart;
    public function save(FinishedCart $finishedCart): void;
    public function update(FinishedCart $finishedCart): void;
}
