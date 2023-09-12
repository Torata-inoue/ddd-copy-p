<?php

namespace sixth\ApplicationService;

use sixth\Command\UserRegisterCommand;

interface IUserRegisterService
{
    public function handle(UserRegisterCommand $userRegisterCommand): void;
}
