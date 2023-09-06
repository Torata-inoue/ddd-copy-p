<?php

class User
{
    public function __construct(
        private readonly UserId $userId,
        private string $name
    ) {
    }

    public function changeName(string $name): void
    {
        if (strlen($this->name) <= 3) {
            throw new Exception('ユーザー名は3文字以上です');
        }
        $this->name = $name;
    }

    public function equals(User $other): bool
    {
        return $this->userId === $other->userId;
    }
}

class UserId
{
    public function __construct(private string $value)
    {
    }
}

$user = new User('naruse');
$other = new User('nrs');
function check(User $leftUser, User $rightUser): void
{
    if ($leftUser->equals($rightUser)) {
        var_dump('同一のユーザーです');
    } else {
        var_dump('別のユーザーです');
    }
}

check($user, $other);
