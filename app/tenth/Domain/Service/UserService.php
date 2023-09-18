<?php

namespace tenth\Domain\Service;

use tenth\Domain\Entity\User;
use tenth\Domain\Repository\IUserRepository;

class UserService
{
    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function exists(User $user): bool
    {
        return boolval($this->userRepository->findByMail($user->mailAddress));
    }
}
