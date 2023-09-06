<?php

class User
{
    public function __construct(
        public string $name
    ) {
        if (strlen($this->name) <= 3) {
            throw new Exception('ユーザー名は3文字以上です');
        }
    }
}
