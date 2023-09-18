<?php

namespace tenth\Domain\Service;

use tenth\Domain\Entity\User;

class UserService
{
    public function exists(User $user): bool
    {
        return true;
    }
}
