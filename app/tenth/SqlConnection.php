<?php

namespace tenth;

use PDO;

class SqlConnection
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

    public function createCommand(): PDO
    {
        return $this->pdo;
    }
}
