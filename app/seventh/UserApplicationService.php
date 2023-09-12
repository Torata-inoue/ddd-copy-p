<?php

namespace seventh;

class UserApplicationService
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }
}
