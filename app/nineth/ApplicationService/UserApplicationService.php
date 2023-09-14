<?php

namespace nineth\ApplicationService;

use nineth\Entity\User;
use nineth\Factory\IUserFactory;
use nineth\Repository\IUserRepository;

readonly class UserApplicationService
{
    public function __construct(
        private IUserFactory $userFactory,
        private IUserRepository $userRepository,
    ) {
    }

    public function register(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
//        $user = $this->userFactory->create($userName);
        $user = new User($this->userRepository->nextId(), $userName);
        if ($this->userService->exists($user)) {
            throw new \Exception('ユーザはすでに存在しています');
        }
        $this->userRepository->save($user);
    }
}
