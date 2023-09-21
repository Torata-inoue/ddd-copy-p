<?php

namespace twelveth\Domain\Entity;

use twelveth\Domain\ValueObject\CircleId;
use twelveth\Domain\ValueObject\CircleName;

class Circle
{
    public function __construct(
        public readonly CircleId $id,
        public CircleName $name,
        public User $owner,
        private array $members
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
