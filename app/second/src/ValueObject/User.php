<?php

class User
{
    public UserId $userId;

    public function __construct(public UserName $useName)
    {
    }
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
        if (strlen($this->value) >= 3) {
            throw new Exception('ユーザー名は3文字以上です');
        }
    }
}

function createUser(string $name) {
    $userName = new UserName($name);
    $user = new User($userName);
}
function updateUser(string $name, string $id) {
    $userName = new UserName($name);
}
