<?php

namespace sixth\DomainService;

use sixth\Entity\User;
use sixth\Repository\IUserRepository;

class UserService
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    public function exists(User $user): bool
    {
        $duplicatedUser = $this->userRepository->findByName($user->name);
        return $duplicatedUser != null;
    }
}
