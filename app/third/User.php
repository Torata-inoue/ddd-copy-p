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
}

class UserId
{
    public function __construct(private string $value)
    {
    }
}
