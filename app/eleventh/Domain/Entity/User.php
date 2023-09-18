<?php

namespace eleventh\Domain\Entity;

use eleventh\Domain\ValueObject\MailAddress;
use eleventh\Domain\ValueObject\UserName;

class User
{
    public MailAddress $mailAddress;

    public UserName $name;

}
