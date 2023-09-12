<?php

namespace seventh;

class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct()
    {
//        $this->userRepository = new InMemoryUserRepository();
        $this->userRepository = new UserRepository();
    }
}
