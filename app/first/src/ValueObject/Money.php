<?php

readonly class Money
{
    public function __construct(
        private float $decimal,
        private string $currency
    ) {
    }
}
