<?php

namespace fifth;

use PDO;

class UserRepository implements IUserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $host = '127.0.0.1';  // データベースのホスト
        $dbname = 'your_database_name';  // データベースの名前
        $user = 'your_username';  // データベースのユーザー名
        $pass = 'your_password';  // データベースのパスワード
        $charset = 'utf8';  // 文字コード

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $this->pdo = new PDO($dsn, $user, $pass);
    }

    public function save(User $user): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindParam(':name', $user->name->value);
        $stmt->execute();
    }

    public function find(UserName $name): ?User
    {
        // TODO: Implement find() method.
    }
}
