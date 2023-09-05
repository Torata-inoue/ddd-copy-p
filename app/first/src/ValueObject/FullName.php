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

$result2 = $nameA == $nameB;
var_dump($result2);
