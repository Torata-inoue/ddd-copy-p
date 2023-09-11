<?php

namespace sixth\ValueObject;

readonly class UserId
{
    public function __construct(public string $value)
    {
    }
}
