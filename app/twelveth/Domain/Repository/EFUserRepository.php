<?php

namespace twelveth\Domain\Repository;

use twelveth\Domain\Entity\User;
use twelveth\Domain\Notification\UserDataModelBuilder;
use twelveth\Domain\ValueObject\UserId;

class EFUserRepository implements IUserRepository
{

    public function save(User $user)
    {
        $builder = new UserDataModelBuilder();
        $user->notify($builder);

        $userDataModel = $builder->build();
        $save($userDataModel);
    }

    public function findById(UserId $id): ?User
    {
        // TODO: Implement findById() method.
    }
}
