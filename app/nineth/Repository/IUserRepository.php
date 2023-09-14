<?php

namespace nineth\Repository;

use nineth\Entity\User;

interface IUserRepository
{
    public function save(User $user): void;
}
