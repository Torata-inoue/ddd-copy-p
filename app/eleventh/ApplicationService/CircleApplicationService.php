<?php

namespace eleventh\ApplicationService;

use eleventh\Command\CircleCreateCommand;
use eleventh\Domain\Entity\ICircleFactory;
use eleventh\Domain\Repository\ICircleRepository;
use eleventh\Domain\Repository\IUserRepository;
use eleventh\Domain\Service\CircleService;
use eleventh\Domain\ValueObject\CircleName;
use eleventh\Domain\ValueObject\UserId;
use eleventh\TransactionScope;

readonly class CircleApplicationService
{
    public function __construct(
        private ICircleFactory $circleFactory,
        private ICircleRepository $circleRepository,
        private CircleService $circleService,
        private IUserRepository $userRepository
    ) {
    }

    public function create(CircleCreateCommand $command): void
    {
        $transaction = new TransactionScope();

        $ownerId = new UserId($command->userId);
        $owner = $this->userRepository->findById($ownerId);
        if (!$owner) {
            throw new \Exception('オーナーとなるユーザーが存在しません');
        }

        $name = new CircleName($command->name);
        $circle = $this->circleFactory->create($name, $owner);
        if ($this->circleService->exists($circle)) {
            throw new \Exception('サークルはすでに存在しています');
        }

        $this->circleRepository->save($circle);

        $transaction->complete();
    }
}
