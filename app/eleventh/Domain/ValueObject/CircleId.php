<?php

namespace eleventh\Domain\ValueObject;

readonly class CircleId
{
    public function __construct(public string $value)
    {
    }
}
