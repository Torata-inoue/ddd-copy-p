<?php

readonly class FullName
{
    public function __construct(
        public string $FirstName,
        public string $LastName,
        public string $MiddleName = ''
    ) {
        if (!$this->FirstName) {
            throw new Exception($this->FirstName);
        }
        if (!$this->LastName) {
            throw new Exception($this->LastName);
        }
        if (!$this->validateName($this->FirstName)) {
            throw new Exception('許可されていない文字が使われています');
        }
        if (!$this->validateName($this->LastName)) {
            throw new Exception('許可されていない文字が使われています');
        }
    }

    public function equals(FullName $other): bool
    {
        return $this->FirstName == $other->FirstName
            && $this->LastName == $other->LastName
            && $this->MiddleName == $other->MiddleName;
    }

    private function validateName(string $value): bool
    {
        // アルファベットに限定
        return true;
    }
}

$nameA = new FullName('masanobu', 'naruse');
$nameB = new FullName('masanobu', 'naruse');

$result = $nameA->equals($nameB);
var_dump($result);

$result2 = $nameA == $nameB;
var_dump($result2);

//$badResult = $nameA->FirstName && $nameB->FirstName
//    && $nameA->LastName && $nameB->LastName
//    && $nameA->MiddleName && $nameB->MiddleName;
//var_dump($badResult);
