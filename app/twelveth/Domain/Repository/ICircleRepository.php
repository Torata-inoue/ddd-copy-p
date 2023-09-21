<?php

namespace twelveth\Domain\Repository;

use twelveth\Domain\Entity\Circle;
use twelveth\Domain\ValueObject\CircleId;
use twelveth\Domain\ValueObject\CircleName;

interface ICircleRepository
{
    public function save(Circle $circle): void;

    public function findById(CircleId $id): ?Circle;

    public function findByName(CircleName $name): ?Circle;
}
