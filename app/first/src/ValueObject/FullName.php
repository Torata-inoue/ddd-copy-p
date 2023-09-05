<?php

readonly class FullName
{
    public function __construct(
        public string $FirstName,
        public string $LastName
    ) {
    }
}

$nameA = new FullName('masanobu', 'naruse');
$nameB = new FullName('masanobu', 'naruse');

$result = $nameA->FirstName === $nameB->FirstName;
var_dump($result);

var_dump(1.value == 0.value);
