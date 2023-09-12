<?php

namespace seventh;

class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct()
    {
        // 依存解決が設定されていないのでエラーを起こす
        $this->userRepository = ServiceLocator::resolve();
    }

    public function register(UserRegisterCommand $command): void
    {

    }
}

ServiceLocator::register(UserRepository::class);
