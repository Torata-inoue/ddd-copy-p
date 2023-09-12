<?php

namespace sixth\Command;

readonly class UserUpdateCommand
{
    public function __construct(
        public string $id,
        public ?string $name = null,
        public ?string $emailAddress = null
    ) {
    }


}
