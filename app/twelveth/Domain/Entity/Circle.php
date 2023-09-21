<?php

namespace twelveth\Domain\Entity;

use twelveth\Domain\ValueObject\CircleId;
use twelveth\Domain\ValueObject\CircleName;
use twelveth\Domain\ValueObject\UserId;
use twelveth\Domain\ValueObject\UserName;

class Circle
{
    /**
     * @param CircleId $id
     * @param CircleName $name
     * @param User $owner
     * @param UserId[] $members
     */
    public function __construct(
        public readonly CircleId $id,
        public CircleName $name,
        public User $owner,
        private array $members
    ) {
    }

    public function isFull(): bool
    {
        return $this->countMembers() >= 30;
    }

    public function countMembers(): int
    {
        return count($this->members) + 1;
    }

    public function join(User $member): void
    {
        if ($this->isFull()) {
            throw new \Exception('サークルメンバーは29人までです');
        }
        $this->members[] = $member;
    }

//    public function changeMemberName(UserId $id, UserName $name)
//    {
//        $target = null;
//
//        /** @var User $user */
//        foreach ($this->members as $user) {
//            if ($user->id->equals($id)) {
//                $target = $user;
//            }
//        }
//        $target->changeName($name);
//    }
}
