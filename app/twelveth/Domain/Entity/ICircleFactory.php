<?php

namespace twelveth\Domain\Entity;

use eleventh\Domain\ValueObject\CircleName;

interface ICircleFactory
{
    public function create(CircleName $name, User $owner): Circle;
}
