<?php

namespace fifth;

class InMemoryUserRepository implements IUserRepository
{
    /**
     * @var array<UserId, User>
     */
    public array $dictionary = [];

    public function save(User $user): void
    {
        $this->dictionary[$user->id->value] = clone $user;
    }

    public function find(UserName $name): ?User
    {
        foreach ($this->dictionary as $user) {
            if ($user->name->value === $name->value) {
                return clone $user;
            }
        }
        return null;
    }
}
