<?php

namespace sixth\ApplicationService;

use sixth\DomainService\UserService;
use sixth\Entity\User;
use sixth\Repository\IUserRepository;
use sixth\ValueObject\UserName;

readonly class UserApplicationService
{
    public function __construct(
        private IUserRepository $userRepository,
        private UserService $userService
    ) {
    }

    public function register(string $name): void
    {
        $user = new User(new UserName($name));

        if ($this->userService->exists($user)) {
            throw new \Exception('ユーザーは既に存在しています。');
        }

        $this->userRepository->save($user);
    }
}
