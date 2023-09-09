<?php

namespace fifth;

use PDO;

class UserService
{
    public function __construct(private IUserRepository $userRepositry)
    {

    }

    public function exists(User $user): bool
    {
        // ユーザー名により重複確認を行うという知識は失われている
        return $this->userRepositry->exists($user);

        $found = $this->userRepositry->find($user->name);
        return $found != null;

        $host = '127.0.0.1';  // データベースのホスト
        $dbname = 'your_database_name';  // データベースの名前
        $user = 'your_username';  // データベースのユーザー名
        $pass = 'your_password';  // データベースのパスワード
        $charset = 'utf8';  // 文字コード

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $pdo = new PDO($dsn, $user, $pass);

        $stmt = $pdo->prepare("SELECT * FROM users where id = :id");
        $stmt->bindParam('id', $user->id);

        return $stmt->fetch();
    }
}
