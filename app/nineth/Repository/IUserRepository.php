<?php

namespace nineth\Repository;

use nineth\Entity\User;

interface IUserRepository
{
    public function save(User $user): void;

    public function find(UserId $id): User;

    public function nextId(): UserId;
}
