<?php

namespace twelveth\Domain\Entity;

use twelveth\Domain\ValueObject\MailAddress;
use twelveth\Domain\ValueObject\UserName;

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
