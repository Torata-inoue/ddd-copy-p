<?php

namespace eleventh\Domain\Service;

use eleventh\Domain\Entity\Circle;
use eleventh\Domain\Repository\ICircleRepository;

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
