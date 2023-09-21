<?php

namespace twelveth\Domain\Notification;

use twelveth\Domain\ValueObject\UserId;
use twelveth\Domain\ValueObject\UserName;

class UserDataModelBuilder implements IUserNotification
{
    private UserId $id;
    private UserName $name;

    public function id(UserId $id): void
    {
        $this->id = $id;
    }

    public function name(UserName $name): void
    {
        $this->name = $name;
    }

    public function build(): UserDataModel
    {
        return new UserDataModel($this->id, $this->name);
    }
}
