<?php

namespace sixth\ApplicationService;

use sixth\Command\UserUpdateCommand;
use sixth\DomainService\UserService;
use sixth\DTO\UserData;
use sixth\Entity\User;
use sixth\Repository\IUserRepository;
use sixth\ValueObject\MailAddress;
use sixth\ValueObject\UserId;
use sixth\ValueObject\UserName;

readonly class UserApplicationService
{
    public function __construct(
        private IUserRepository $userRepository,
        private UserService $userService
    ) {
    }

    public function register(string $name, string $mailAddress): void
    {
        $user = new User(
            new UserName($name),
            new MailAddress($mailAddress)
        );
        if ($this->userService->exists($user)) {
            throw new \Exception('ユーザは既に存在しています');
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

    public function update(UserUpdateCommand $command): void
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->findById($targetId);
        if (!$user) {
            throw new \Exception('このユーザは存在しません');
        }

        $name = $command->name;
        if ($name) {
            $newUserName = new UserName($name);
            $user->changeName($newUserName);
            if ($this->userService->exists($user)) {
                throw new \Exception('ユーザは既に存在しています');
            }
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
