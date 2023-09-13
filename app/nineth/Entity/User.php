<?php

namespace nineth\Entity;

class User
{
    public UserId $id;

    public function __construct(public UserName $name)
    {
        $this->id = new UserId(uniqid());
    }

    public function newUser(UserId $id, UserName $name): self
    {
        $this->id = $id;
        $this->name = $name;

        return $this;
    }
}
