<?php

namespace tenth\Domain\Repository;

use tenth\Domain\Entity\User;
use tenth\Domain\ValueObject\MailAddress;

interface IUserRepository
{
    public function save(User $user);

    public function findByMail(MailAddress $address): ?User;
}
