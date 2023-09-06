<?php

namespace forth;

class Program
{
    public function createUser(string $userName): void
    {
        $user = new User(new UserName($userName));
        $userService = new UserService();
        if ($userService->exists($user)) {
            throw new \Exception("{$userName}は既に存在しています");
        }

        // DBへinsertする処理
    }
}
