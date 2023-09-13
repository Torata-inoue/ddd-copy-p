<?php

namespace eight\src;

use eight\src\Repository\InMemoryUserRepository;
use eight\src\ApplicationService\UserApplicationService;
use eight\src\DomainService\UserService;
use eight\src\Repository\IUserRepository;

class Program
{
    static public function main(): void
    {
        self::startUp();
    }

    private static function startUp(): void
    {
        $serviceCollection = new ServiceCollection();
        $serviceCollection->addSingleton(IUserRepository::class, InMemoryUserRepository::class);

        $serviceCollection->addTransient(UserService::class);
        $serviceCollection->addTransient(UserApplicationService::class);
    }
}
