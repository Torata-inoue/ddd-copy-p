<?php

namespace fifth;

interface IUserRepository
{
    public function save(User $user): void;

    public function find(UserName $name): ?User;
}
