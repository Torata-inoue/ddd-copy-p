<?php

namespace sixth\DTO;

use sixth\Entity\User;

class UserData
{
    public string $id;
    public string $name;

    public function __construct(User $user)
    {
        $this->id = $user->id->value;
        $this->name = $user->name->value;
    }
}
