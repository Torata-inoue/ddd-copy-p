<?php

readonly class FullName
{
    public function __construct(
        public string $FirstName,
        public string $LastName
    ) {
    }
}

$fullName = new FullName('masanobu', 'naruse');
var_dump($fullName->LastName);
