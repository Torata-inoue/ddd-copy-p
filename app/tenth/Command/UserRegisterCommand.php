<?php

namespace tenth\Command;

class UserRegisterCommand
{
    public function __construct(
        public string $name
    ) {
    }
}
