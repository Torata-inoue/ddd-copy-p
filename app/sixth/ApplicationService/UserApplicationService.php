<?php

namespace sixth\ApplicationService;

use sixth\Command\UserUpdateCommand;
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
        $userName = new UserName($name);
        $duplicateUser = $this->userRepository->findByName($userName);
        if ($duplicateUser) {
            throw new \Exception('ユーザは既に存在しています');
        }
        $user = new User($userName);
        $this->userRepository->save($user);
    }

    public function get(string $userId): UserData
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->findById($targetId);
        $userData = new UserData($user);
        return $userData;
    }

    public function update(UserUpdateCommand $command): void
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);
        if (!$user) {
            throw new \Exception('このユーザは存在しません');
        }

        $name = $command->name;
        if ($name) {
            $userName = new UserName($name);
            $duplicateUser = $this->userRepository->findByName($userName);
            if ($duplicateUser) {
                throw new \Exception('ユーザは既に存在しています');
            }
            $user->changeName($userName);
        }

        $mailAddress = $command->emailAddress;
        if ($mailAddress) {
            $newMailAddress = new MailAddress($mailAddress);
            $user->changeMailAddress($newMailAddress);
        }

        $this->userRepository->save($user);
    }

    public function delete(UserDeleteCommand $command): void
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);
        if (!$user) {
            // 対象が見つからないときは退会成功とする
            return;
        }
        $this->userRepository->delete($user);
    }
}
