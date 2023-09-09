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
        $stmt = $this->pdo->prepare("SELECT * FROM users where id = :id");
        $stmt->bindParam('id', $user->id->value);
        $res = $stmt->fetch();
        if ($res) {
            $stmt = $this->pdo->prepare("UPDATE users SET name = :name WHERE id = :id");
            $stmt->bindParam(':name', $user->name->value, PDO::PARAM_STR);
            $stmt->bindParam(':id', $res['id'], PDO::PARAM_INT);
            $stmt->execute();
            return;
        }

        $stmt = $this->pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindParam(':name', $user->name->value);
        $stmt->execute();
    }

    public function find(UserName $name): ?User
    {
        // TODO: Implement find() method.
    }
}
