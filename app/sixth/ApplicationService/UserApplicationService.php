<?php

namespace sixth\ApplicationService;

use sixth\DomainService\UserService;
use sixth\DTO\UserData;
use sixth\Entity\User;
use sixth\Repository\IUserRepository;
use sixth\ValueObject\UserId;
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

    public function get(string $userId): UserData
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->findById($targetId);
        $userData = new UserData($user);
        return $userData;
    }

    public function update(string $userId, string $name): void
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->findById($targetId);
        if (!$user) {
            throw new \Exception('このユーザは存在しません');
        }
        $newUserName = new UserName($name);
        $user->changeName($newUserName);
        if ($this->userService->exists($user)) {
            throw new \Exception('ユーザは既に存在しています');
        }
        $this->userRepository->save($user);
    }
}
