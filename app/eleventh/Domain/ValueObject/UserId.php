<?php

namespace eleventh\Domain\ValueObject;

readonly class UserId
{
    public function __construct(public string $value)
    {
    }
}
