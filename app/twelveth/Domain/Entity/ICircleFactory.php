<?php

namespace twelveth\Domain\Entity;

use twelveth\Domain\ValueObject\CircleName;

interface ICircleFactory
{
    public function create(CircleName $name, User $owner): Circle;
}
