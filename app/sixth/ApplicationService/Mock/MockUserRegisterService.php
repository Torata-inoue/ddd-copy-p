<?php

namespace sixth\ApplicationService\Mock;

use sixth\ApplicationService\IUserRegisterService;
use sixth\Command\UserRegisterCommand;

class MockUserRegisterService implements IUserRegisterService
{

    public function handle(UserRegisterCommand $userRegisterCommand): void
    {
        // TODO: Implement handle() method.
    }
}
