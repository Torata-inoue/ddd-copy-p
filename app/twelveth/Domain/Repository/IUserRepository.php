<?php

namespace twelveth\Domain\Repository;

use eleventh\Domain\Entity\User;
use eleventh\Domain\ValueObject\MailAddress;
use eleventh\Domain\ValueObject\UserId;

interface IUserRepository
{
    public function save(User $user);

    public function findById(UserId $id): ?User;
}
