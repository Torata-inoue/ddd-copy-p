<?php

namespace twelveth\Domain\Entity;

use eleventh\Domain\ValueObject\MailAddress;
use eleventh\Domain\ValueObject\UserName;

class User
{
    public MailAddress $mailAddress;

    public UserName $name;

}

$user = new User();

$userName = new \sixth\ValueObject\UserName('newName');

// NG
$user->name = $userName;

// OK
$user->changeName($userName);
