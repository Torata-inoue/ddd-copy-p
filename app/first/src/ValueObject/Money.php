<?php

readonly class Money
{
    public function __construct(
        private float $amount,
        private string $currency
    ) {
    }

    public function add(Money $arg): Money
    {
        if ($this->currency !== $arg->currency) {
            throw new Exception('通貨が異なります');
        }
        return new Money($this->amount + $arg->amount, $this->currency);
    }
}

$myMoney = new Money(1000, 'JPY');
$allowance = new Money(10, 'USD');
$result = $myMoney->add($allowance);
var_dump($result);
