<?php

namespace sixth\Cohesion;

class HeightCohesionB
{
    private int $value3;
    private int $value4;

    public function methodB(): int
    {
        return $this->value3 + $this->value4;
    }
}
