<?php

namespace twelveth\Domain\Entity;

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

    public function join(User $member): void
    {
        if (count($this->members) >= 29) {
            throw new \Exception('サークルメンバーは29人までです');
        }
        $this->members[] = $member;
    }
}
