<?php

namespace seventh;

interface IUserRepository
{
    public function find(UserId $userId): User;
}

class UserRepository implements IUserRepository
{
    public function find(UserId $userId): User
    {
        // TODO: Implement find() method.
    }
}
