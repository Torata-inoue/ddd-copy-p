<?php

namespace fifth;

readonly class User
{
    public UserId $id;

    public function __construct(public UserName $name)
    {
        $this->id = new UserId('id');
    }
}
