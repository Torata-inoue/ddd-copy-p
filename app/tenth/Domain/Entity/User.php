<?php

namespace tenth\Domain\Entity;

use tenth\Domain\ValueObject\MailAddress;
use tenth\Domain\ValueObject\UserName;

class User
{
    public MailAddress $mailAddress;

    public UserName $name;

}
