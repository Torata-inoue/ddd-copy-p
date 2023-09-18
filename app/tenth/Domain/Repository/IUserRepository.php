<?php

namespace tenth\Domain\Repository;

use tenth\Domain\Entity\User;

interface IUserRepository
{
    public function save(User $user);
}
