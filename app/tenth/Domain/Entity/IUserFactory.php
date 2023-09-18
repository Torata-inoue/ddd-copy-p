<?php

namespace tenth\Domain\Entity;

use tenth\Domain\ValueObject\UserName;

interface IUserFactory
{
    public function create(UserName $userName);
}
