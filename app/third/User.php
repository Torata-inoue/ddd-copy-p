<?php

class User
{
    public function __construct(
        public string $name
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

if (!isset($request->name)) {
    throw new Exception('リクエストのNameが空です');
}
$user = new User($request->name);
