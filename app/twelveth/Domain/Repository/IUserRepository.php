<?php

namespace twelveth\Domain\Repository;

use twelveth\Domain\Entity\User;
use twelveth\Domain\ValueObject\MailAddress;
use twelveth\Domain\ValueObject\UserId;

interface IUserRepository
{
    public function save(User $user);

    public function findById(UserId $id): ?User;
}
