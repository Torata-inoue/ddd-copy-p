<?php

namespace seventh;

class UserApplicationService
{
    private readonly IUserRepository $userRepository;
    private readonly IFooRepository $fooRepository;

    public function __construct()
    {
        // 依存解決が設定されていないのでエラーを起こす
        $this->userRepository = ServiceLocator::resolveUser();
        $this->fooRepository = ServiceLocator::resoleveFoo();
    }

    public function register(UserRegisterCommand $command): void
    {

    }
}

ServiceLocator::register(UserRepository::class);
