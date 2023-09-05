<?php

readonly class FullName
{
    public function __construct(
        public string $FirstName,
        public string $LastName
    ) {
    }

    public function equals(FullName $other): bool
    {
        return $this->FirstName == $other->FirstName && $this->LastName == $other->LastName;
    }
}

$nameA = new FullName('masanobu', 'naruse');
$nameB = new FullName('masanobu', 'naruse');

$result = $nameA->equals($nameB);
var_dump($result);

$result2 = $nameA == $nameB;
var_dump($result2);
