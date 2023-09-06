<?php

namespace forth;

class UserService
{
    public function exists(User $user): bool
    {
        // 重複を確認する処理
    }

    public function changeName(User $user, UseName $useName):void
    {
        $user->name = $useName;
    }
}

$userService = new UserService();

$userId = new UserId("id");
$userName = new UserName("nrs");
$user = new User($userId, $userName);

// ドメインサービスに問い合わせ
$result = $userService->exists($user);
var_dump($result);