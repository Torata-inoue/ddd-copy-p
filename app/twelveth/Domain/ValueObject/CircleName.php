<?php

namespace twelveth\Domain\ValueObject;

readonly class CircleName
{
    public function __construct(public string $value)
    {
        if (strlen($this->value) < 3) {
            throw new \Exception('サークル名は3文字以上です');
        }
        if (strlen($this->value) > 20) {
            throw new \Exception('サークル名は20文字いないです');
        }
    }

    public function equals(CircleName $name): bool
    {
        return $this->value === $name->value;
    }
}
