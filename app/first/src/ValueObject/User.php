<?php

class User
{
    public function __construct(
        private UserId $userId,
        private UseName $useName
    ) {
    }
}

readonly class UserId
{
    public function __construct(
        private string $value
    ) {
    }
}

readonly class UserName
{
    public function __construct(
        private string $value
    ) {
    }
}
