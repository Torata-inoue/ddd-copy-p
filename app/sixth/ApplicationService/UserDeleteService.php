<?php

namespace sixth\ApplicationService;

use sixth\Repository\IUserRepository;
use sixth\ValueObject\UserId;

class UserDeleteService
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    public function handle(UserDeleteCommand $command): void
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
