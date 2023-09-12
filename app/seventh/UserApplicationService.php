<?php

namespace seventh;

class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = ServiceLocator::resolve();
    }
}

ServiceLocator::register(UserRepository::class);
