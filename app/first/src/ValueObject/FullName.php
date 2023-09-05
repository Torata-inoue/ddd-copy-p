<?php

readonly class FullName
{
    public function __construct(
        public string $FirstName,
        public string $LastName
    ) {
    }
}

$fullName = new FullName('john', 'smith');
var_dump($fullName->LastName);

$fullName = new FullName("masanobu", "naruse");
$fullName->changeLastName('sato');  // このようなメソッドは値オブジェクトに存在するべきではない
