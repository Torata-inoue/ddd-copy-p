<?php

namespace forth;

readonly class User
{
    private UserId $userId;

    public function __construct(private UserName $name)
    {
        $this->userId = new UserId('id');
    }
}
