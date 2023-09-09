<?php

namespace fifth;

class User
{
    public function __construct(public UserName $name, public ?UserId $id = null)
    {
        if ($this->id === null) {
            $this->id = new UserId('id');
        }
    }
}
