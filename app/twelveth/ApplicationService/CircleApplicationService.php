<?php

namespace twelveth\ApplicationService;

use twelveth\Command\CircleCreateCommand;
use twelveth\Command\CircleJoinCommand;
use twelveth\Domain\Entity\ICircleFactory;
use twelveth\Domain\Repository\ICircleRepository;
use twelveth\Domain\Repository\IUserRepository;
use twelveth\Domain\Service\CircleService;
use twelveth\Domain\ValueObject\CircleId;
use twelveth\Domain\ValueObject\CircleName;
use twelveth\Domain\ValueObject\UserId;
use twelveth\TransactionScope;

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

    public function join(CircleJoinCommand $command): void
    {
        $transaction = new TransactionScope();

        $memberId = new UserId($command->userId);
        $member = $this->userRepository->findById($memberId);
        if (!$member) {
            throw new \Exception('ユーザーが存在しませんでした');
        }

        $id = new CircleId($command->circleId);
        $circle = $this->circleRepository->findById($id);
        if (!$circle) {
            throw new \Exception('サークルが見つかりませんでした');
        }

        $circle->join($member);
        $this->circleRepository->save($circle);

        $transaction->complete();
    }

    public function update(CiecleUpdateCommand $command): void
    {
        $transaction = new TransactionScope();
        $id = new CircleId($command->id);
        // この時点でUserのインスタンスが再構築されるが
        $circle = $this->circleRepository->findById($id);
        if (!$circle) {
            throw new \Exception('サークルが見つかりません');
        }
        if ($command->name) {
            $name = new CircleName($command->name);
            $circle->changeName($name);

            if ($this->circleService->exists($circle)) {
                throw new \Exception('サークルは既に存在しています');
            }
        }
        $this->circleRepository->save($circle);

        $transaction->complete();

        // Userインスタンスは使われることなく捨てられる
    }
}
