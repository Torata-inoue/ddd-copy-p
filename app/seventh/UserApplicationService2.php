<?php

readonly class UserApplicationService
{
    public function __construct(
        private IUserRepository $userRepository,
        private IFooRepository $fooRepository
    ) {
    }
}

$userRepository = new InMemoryUserRepository();
$userApplicationService = new UserApplicationService($userRepository);
