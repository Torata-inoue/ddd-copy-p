<?php

namespace nineth\Entity;

class User
{
    public function __construct(readonly public UserId $id, public UserName $name)
    {
    }

    public function createCircle(CircleName $name): Circle
    {
        return new Circle(
            $this->id,
            $name
        );
    }
}
