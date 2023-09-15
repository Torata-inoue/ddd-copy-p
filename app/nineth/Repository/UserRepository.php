<?php

namespace nineth\Repository;

use nineth\Entity\User;
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
        // TODO: Implement save() method.
    }

    public function find(UserId $id): User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $res = $stmt->fetch();

        return new User(new UserId($res['id']), new UserName($res['name']));
    }

    public function nextId(): UserId
    {
        $res = $numberingApi->request();
        return new UserId($res->nextId);
    }
}
