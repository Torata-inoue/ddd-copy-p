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
    if (!$name) {
        throw new Exception($name);
    }
    if (strlen($name) >= 3) {
        throw new Exception('ユーザー名は3文字以上です');
    }
    $user = new User();
}
