<?php

namespace nineth\Factory;

use nineth\Entity\User;

class InMemoryUserFactory implements IUserFactory
{
    private int $currentId = 0;

    public function create(UserName $name): User
    {
        $this->currentId++;

        return new User(new UserId($this->currentId));
    }
}
