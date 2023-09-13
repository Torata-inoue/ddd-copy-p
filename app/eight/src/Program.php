<?php

namespace eight\src;

use eight\ServiceCollection;
use eight\src\ApplicationService\UserApplicationService;
use eight\src\DomainService\UserService;
use eight\src\Repository\IUserRepository;
use eight\src\Repository\UserRepository;

class Program
{
    static public function main(): void
    {
        self::startUp();
    }

    private static function startUp(): void
    {
        $serviceCollection = new ServiceCollection();
        $serviceCollection->addSingleton(IUserRepository::class, UserRepository::class);

        $serviceCollection->addTransient(UserService::class);
        $serviceCollection->addTransient(UserApplicationService::class);
    }
}
