<?php

namespace forth;

class User
{
    public function __construct(private readonly UserId $id, private UserName $name)
    {
    }

    // 追加した重複確認のふるまい
    public function Exists(User $user)
    {
        // 重複を確認するコード
    }
}
