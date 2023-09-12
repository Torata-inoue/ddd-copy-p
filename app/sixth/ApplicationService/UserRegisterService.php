<?php

namespace sixth\ApplicationService;

use sixth\Command\UserRegisterCommand;
use sixth\DomainService\UserService;
use sixth\Entity\User;
use sixth\Repository\IUserRepository;
use sixth\ValueObject\MailAddress;
use sixth\ValueObject\UserName;

class UserRegisterService
{
    public function __construct(
        private IUserRepository $userRepository,
        private UserService $userService
    ) {
    }

    public function handle(UserRegisterCommand $command): void
    {
        $user = new User(
            new UserName($command->name),
            new MailAddress($command->mailAddress)
        );
        if ($this->userService->exists($user)) {
            throw new \Exception('ユーザは既に存在しています');
        }
        $this->userRepository->save($user);
    }
}
