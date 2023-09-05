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

var_dump($nameA->equals($nameB));
