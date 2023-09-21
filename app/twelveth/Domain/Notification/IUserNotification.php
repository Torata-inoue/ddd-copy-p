<?php

namespace twelveth\Domain\Notification;

use twelveth\Domain\ValueObject\UserId;
use twelveth\Domain\ValueObject\UserName;

interface IUserNotification
{
    public function id(UserId $id): void;

    public function name(UserName $name): void;
}
