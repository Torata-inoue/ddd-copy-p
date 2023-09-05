<?php

readonly class FullName
{
    public function __construct(
        private FirstName $firstName,
        private LastName $lastName
    ) {

    }
}

readonly class FirstName
{
    public function __construct(
        private string $value
    ) {
        if (!$this->value) {
            throw new Exception('1文字以上である必要があります。');
        }
    }
}

readonly class LastName
{
    public function __construct(
        private string $value
    ) {
        if (!$this->value) {
            throw new Exception('1文字以上である必要があります。');
        }
    }
}
