<?php

namespace Katas\Cart\Domain;

use Katas\Shared\Domain\ValueObjects\Uuid;

interface UserRepository
{
   public function find(Uuid $uuid): Cart;

    public function save(User $user): void;

    public function update(User $user): void;
}
