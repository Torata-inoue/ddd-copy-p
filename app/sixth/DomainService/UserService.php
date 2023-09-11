<?php

namespace sixth\DomainService;

use sixth\Entity\User;

class UserService
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    public function exists(User $user): bool
    {
        $duplicatedUser = $this->userRepository->find($user->name);
        return $duplicatedUser != null;
    }
}
