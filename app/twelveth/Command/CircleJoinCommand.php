<?php

namespace twelveth\Command;

class CircleJoinCommand
{
    public function __construct(
        public string $userId,
        public string $circleId
    ) {
    }
}
