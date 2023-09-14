<?php

namespace nineth\Entity;

use PDO;

class User
{
    public function __construct(public UserId $id, public UserName $name)
    {
    }
}
