<?php

namespace eleventh\Domain\Entity;

use eleventh\Domain\ValueObject\CircleId;
use eleventh\Domain\ValueObject\CircleName;

class Circle
{
    public function __construct(
        public readonly CircleId $id,
        public CircleName $name,
        public User $owner,
        public array $members
    ) {
    }
}
