<?php

namespace nineth\Factory;

use nineth\Entity\User;

interface IUserFactory
{
    public function create(UserName $name): User;
}
