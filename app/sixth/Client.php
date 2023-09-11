<?php

namespace sixth;

use sixth\ApplicationService\UserApplicationService;
use sixth\Command\UserUpdateCommand;
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

    public function update(string $id): void
    {
        $nameUpdateCommand = new UserUpdateCommand($id, name: 'naruse');
        $this->userApplicationService->update($nameUpdateCommand);

        $updateMailAddressCommand = new UserUpdateCommand($id, emailAddress: 'xxxx@example.com');
        $this->userApplicationService->update($updateMailAddressCommand);
    }
}
