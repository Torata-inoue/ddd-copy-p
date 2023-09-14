<?php

namespace nineth\Entity;

use PDO;

class User
{
    public UserId $id;

    public function __construct(public UserName $name)
    {
        $this->id = new UserId(uniqid());
    }

    public function newUser(UserId $id, UserName $name): self
    {
        $this->name = $name;

        $host = '127.0.0.1';  // データベースのホスト
        $dbname = 'your_database_name';  // データベースの名前
        $user = 'your_username';  // データベースのユーザー名
        $pass = 'your_password';  // データベースのパスワード
        $charset = 'utf8';  // 文字コード

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $this->pdo = new PDO($dsn, $user, $pass);
        $stmt = $this->pdo->prepare("SELECT max('id') FROM users;");
        $res = $stmt->fetch();
        $this->id = $res['id'] + 1;

        return $this;
    }
}
