<?php

namespace fifth;

use PDO;

class UserService
{
    public function __construct(private IUserRepository $userRepositry)
    {

    }

    public function exists(User $user): bool
    {
        // ユーザー名により重複確認を行うという知識は失われている
        return $this->userRepositry->exists($user->name);

        $found = $this->userRepositry->find($user->name);
        return $found != null;
    }
}
