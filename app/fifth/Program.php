<?php

namespace fifth;

use PDO;

class Program
{
    public function createUser(string $userName): void
    {
        $user = new User(new UserName($userName));
        $userService = new UserService();
        if ($userService->exists($user)) {
            throw new \Exception("{$userName}は既に存在しています");
        }

        $host = '127.0.0.1';  // データベースのホスト
        $dbname = 'your_database_name';  // データベースの名前
        $user = 'your_username';  // データベースのユーザー名
        $pass = 'your_password';  // データベースのパスワード
        $charset = 'utf8';  // 文字コード

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $pdo = new PDO($dsn, $user, $pass);

        $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindParam(':name', $userName);
        $stmt->execute();
    }
}
