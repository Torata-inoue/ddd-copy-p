<?php

namespace eight\src;

use eight\src\Command\UserRegisterCommand;
use eight\src\Repository\InMemoryUserRepository;
use eight\src\ApplicationService\UserApplicationService;
use eight\src\DomainService\UserService;
use eight\src\Repository\IUserRepository;

class Program
{
    private static ServiceProvider $serviceProvider;

    static public function main(): void
    {
        self::startUp();

        while (true) {
            $input = readline('input user name' . PHP_EOL . '>');
            $userApplicationService = self::$serviceProvider->getService(UserApplicationService::class);
            $command = new UserRegisterCommand($input);
            $userApplicationService->register($command);

            echo '------------------------------------' . PHP_EOL;
            echo 'user created';
            echo '------------------------------------' . PHP_EOL;
            echo 'user name: ' . $input . PHP_EOL;
            echo '------------------------------------' . PHP_EOL;

            $isContinue = readline('continue? (y/n)');
            if ($isContinue == 'n') {
                break;
            }
        }
    }

    private static function startUp(): void
    {
        $serviceCollection = new ServiceCollection();
        $serviceCollection->addSingleton(IUserRepository::class, InMemoryUserRepository::class);

        $serviceCollection->addTransient(UserService::class);
        $serviceCollection->addTransient(UserApplicationService::class);

        self::$serviceProvider = $serviceCollection->buildServiceProvider();
    }
}

Program::main();
