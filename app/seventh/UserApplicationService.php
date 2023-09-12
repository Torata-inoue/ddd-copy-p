<?php

namespace seventh;

class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = ServiceLocator::resolve();
    }

    public function register(UserRegisterCommand $command): void
    {

    }
}

ServiceLocator::register(UserRepository::class);
