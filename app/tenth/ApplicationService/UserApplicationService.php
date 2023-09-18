<?php

namespace tenth\ApplicationService;

use tenth\Command\UserRegisterCommand;
use tenth\Domain\Entity\IUserFactory;
use tenth\Domain\Repository\IUserRepository;
use tenth\Domain\Service\UserService;
use tenth\Domain\ValueObject\UserName;
use tenth\SqlConnection;

class UserApplicationService
{
    public function __construct(
        private IUserFactory $userFactory,
        private IUserRepository $userRepository,
        private UserService $userService,
        private SqlConnection $connection
    ) {
    }

    public function register(UserRegisterCommand $command): void
    {
        $transaction = $this->connection->beginTransaction();

        $userName = new UserName($command->name);
        $user = $this->userFactory->create($userName);

        if ($this->userService->exists($user)) {
            throw new \Exception('Userはすでに存在しています');
        }

        $this->userRepository->save($user);

        $transaction->commit();
    }
}
