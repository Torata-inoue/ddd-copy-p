<?php

namespace sixth\Repository;

use sixth\Entity\User;
use sixth\ValueObject\UserId;
use sixth\ValueObject\UserName;

interface IUserRepository
{
    public function findById(UserId $id): ?User;

    public function findByName(UserName $name): ?User;

    public function save(User $user): void;

    public function delete(User $user): void;
}
