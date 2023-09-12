<?php

namespace sixth\Cohesion;

class HeightCohesionA
{
    private int $value1;
    private int $value2;

    public function methodA(): int
    {
        return $this->value1 + $this->value2;
    }
}
