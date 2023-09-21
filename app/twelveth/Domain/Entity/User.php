<?php

namespace twelveth\Domain\Entity;

use twelveth\Domain\Notification\IUserNotification;
use twelveth\Domain\ValueObject\UserId;
use twelveth\Domain\ValueObject\UserName;

class User
{
    private UserName $name;

    private readonly UserId $id;

    public function notify(IUserNotification $note): void
    {
        $note->id($this->id);
        $note->name($this->name);
    }

}
//
//$user = new User();
//
//$userName = new \sixth\ValueObject\UserName('newName');
//
//// NG
//$user->name = $userName;
//
//// OK
//$user->changeName($userName);
