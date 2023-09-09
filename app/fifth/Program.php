<?php

namespace fifth;

use PDO;

class Program
{
    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function createUser(string $userName): void
    {
        $user = new User(new UserName($userName));
        $userService = new UserService($this->userRepository);
        if ($userService->exists($user)) {
            throw new \Exception("{$userName}は既に存在しています");
        }

        $this->userRepository->save();
    }
}
