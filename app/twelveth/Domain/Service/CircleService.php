<?php

namespace twelveth\Domain\Service;

use twelveth\Domain\Entity\Circle;
use twelveth\Domain\Repository\ICircleRepository;

readonly class CircleService
{
    public function __construct(private ICircleRepository $circleRepository)
    {
    }

    public function exists(Circle $circle): bool
    {
        return (bool) $this->circleRepository->findByName($circle->name);
    }
}
