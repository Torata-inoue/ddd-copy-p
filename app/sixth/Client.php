<?php

namespace sixth;

use sixth\ApplicationService\UserApplicationService;
use sixth\ValueObject\UserName;

class Client
{
    private UserApplicationService $userApplicationService;

    public function changeName(string $id, string $name): void
    {
        $target = $this->userApplicationService->get($id);
        $newName = new UserName($name);
        $target->changeName($newName);
    }
}
