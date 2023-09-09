<?php

namespace fifth;

readonly class User
{
    private UserId $userId;

    public function __construct(public UserName $name)
    {
        $this->userId = new UserId('id');
    }
}
