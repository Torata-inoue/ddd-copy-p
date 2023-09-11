<?php

namespace sixth;

class User
{
    private UserId $id;

    public function __construct(private UserName $name)
    {
        $this->id = new UserId(uniqid());
    }

    public function newUser(UserId $id, UserName $name): self
    {
        $this->id = $id;
        $this->name = $name;

        return $this;
    }

    public function changeName(UserName $name): void
    {
        $this->name = $name;
    }
}
