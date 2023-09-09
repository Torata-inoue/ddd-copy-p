<?php

namespace fifth;

readonly class UserName
{
    public function __construct(private string $value)
    {
        if (strlen($this->value) < 3) {
            throw new \Exception('ユーザー名は3文字以上です');
        }
    }
}
