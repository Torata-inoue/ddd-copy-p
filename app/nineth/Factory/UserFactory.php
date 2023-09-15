<?php

namespace nineth\Factory;

use nineth\Entity\User;
use PDO;

class UserFactory implements IUserFactory
{

    public function create(UserName $name): User
    {
        $host = '127.0.0.1';  // データベースのホスト
        $dbname = 'your_database_name';  // データベースの名前
        $user = 'your_username';  // データベースのユーザー名
        $pass = 'your_password';  // データベースのパスワード
        $charset = 'utf8';  // 文字コード

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $pdo = new PDO($dsn, $user, $pass);
        $stmt = $pdo->prepare("SELECT max('id') FROM users;");
        $res = $stmt->fetch();
        $id = new UserId($res['id'] + 1);

        return new User($id, $name);
    }
}
