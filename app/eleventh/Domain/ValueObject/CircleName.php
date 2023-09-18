<?php

namespace eleventh\Domain\ValueObject;

readonly class CircleName
{
    public function __construct(public string $value)
    {
        if (strlen($this->value) < 3) {
            throw new \Exception('サークル名は3文字以上です');
        }
    }
}
