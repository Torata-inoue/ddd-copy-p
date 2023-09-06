<?php

readonly class ModelNumber
{
    public function __construct(
        private string $productCode,
        private string $branch,
        private string $lot
    ) {
    }

    public function toString(): string
    {
        return "{$this->productCode}{$this->branch}{$this->lot}";
    }
}
