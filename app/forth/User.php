<?php

namespace forth;

class User
{
    public function __construct(private readonly UserId $id, private UserName $name)
    {
    }

    // 追加した重複確認のふるまい
    public function exists(User $user): bool
    {
        // 重複を確認するコード
        return true;
    }

    public function changeUserName(UserName $userName): void
    {
        $this->name = $userName;
    }
}

$checkId = new UserId("check");
$checkName = new UseName("checker");
$checkObj = new User($checkId, $checkName);

$userId = new UserId("id");
$userName = new UserName("nrs");
$user = new User($userId, $userName);

// 生成したオブジェクト自信に問い合わせることになる
$result = $checkObj->exists($user);
var_dump($result);
