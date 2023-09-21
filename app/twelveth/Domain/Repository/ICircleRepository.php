<?php

namespace twelveth\Domain\Repository;

use eleventh\Domain\Entity\Circle;
use eleventh\Domain\ValueObject\CircleId;
use eleventh\Domain\ValueObject\CircleName;

interface ICircleRepository
{
    public function save(Circle $circle): void;

    public function findById(CircleId $id): ?Circle;

    public function findByName(CircleName $name): ?Circle;
}
