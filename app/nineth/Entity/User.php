<?php

namespace nineth\Entity;

use PDO;

class User
{
    public function __construct(public UserId $id, public UserName $name)
    {
    }

    public function setId(UserId $id): void
    {
        $this->id = $id;
    }
}
