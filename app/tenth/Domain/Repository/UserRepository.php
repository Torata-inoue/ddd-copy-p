<?php

namespace tenth\Domain\Repository;

use tenth\Domain\Entity\User;
use tenth\Domain\ValueObject\MailAddress;
use tenth\Domain\ValueObject\UserName;
use tenth\SqlConnection;

class UserRepository implements IUserRepository
{
    public function __construct(private readonly SqlConnection $connection)
    {
    }

    public function save(User $user): void
    {
        $command = $this->connection->createCommand();

        $stmt = $command->prepare("SELECT * FROM users where id = :id");
        $stmt->bindParam('id', $user->id->value);
        $res = $stmt->fetch();
        if ($res) {
            $stmt = $command->prepare("UPDATE users SET name = :name WHERE id = :id");
            $stmt->bindParam(':name', $user->name->value, PDO::PARAM_STR);
            $stmt->bindParam(':id', $res['id'], PDO::PARAM_INT);
            $stmt->execute();
            return;
        }

        $stmt = $command->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindParam(':name', $user->name->value);
        $stmt->execute();
    }

    public function findByMail(MailAddress $address): ?User
    {
        $command = $this->connection->createCommand();

        $stmt = $command->prepare("SELECT * FROM users where name = :name");
        $stmt->bindParam('name', $address->value);
        $res = $stmt->fetch();
        if (!$res) {
            return null;
        }
        $user = new User(new UserName($res['name']));
        $user->id = new UserId($res['id']);
        return $user;
    }
}
