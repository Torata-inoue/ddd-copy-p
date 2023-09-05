<?php

class User
{
    public UserId $userId;
    public UseName $useName;
}

readonly class UserId
{
    public function __construct(
        private string $value
    ) {
    }
}

readonly class UserName
{
    public function __construct(
        private string $value
    ) {
    }
}

function createUser(UserName $name) {
    $user = new User();
    $user->id = $name;
    return $user;
}
