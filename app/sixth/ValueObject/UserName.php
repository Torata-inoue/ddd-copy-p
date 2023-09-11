<?php

namespace sixth\ValueObject;

readonly class UserName
{
    public function __construct(public string $value)
    {
        if (strlen($this->value) < 3) {
            throw new \Exception('ユーザー名は3文字以上です');
        }
    }
}
