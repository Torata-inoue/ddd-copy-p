<?php

namespace sixth;

use sixth\ApplicationService\IUserRegisterService;
use sixth\ApplicationService\UserApplicationService;
use sixth\Command\UserRegisterCommand;
use sixth\Command\UserUpdateCommand;
use sixth\ValueObject\UserName;

class Client
{
    public function __construct(
        private readonly UserApplicationService $userApplicationService,
        private readonly IUserRegisterService $userRegisterService,
    ) {
    }

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

    public function register(string $name, string $email): void
    {
        $command = new UserRegisterCommand($name, $email);
        $this->userRegisterService->handle($command);
    }
}
