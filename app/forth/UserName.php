<?php

namespace forth;

class UserName
{
    public function __construct(private readonly string $value)
    {
        if (strlen($this->value) < 3) {
            throw new \Exception('ユーザー名は3文字以上です');
        }
    }
}
