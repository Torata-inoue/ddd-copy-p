<?php

namespace eleventh\Command;

class CircleCreateCommand
{
    public function __construct(public string $userId, public string $name)
    {
    }
}
