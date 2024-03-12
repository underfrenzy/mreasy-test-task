<?php

namespace module\user;

use Database;

class UserService
{
    public static function findByUsername(string $username)
    {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM Users WHERE username = :username");
        $stmt->execute(['username' => $username]);

        return $stmt->fetch();
    }

    public static function findByToken(string $token)
    {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM Users WHERE token = :token");
        $stmt->execute(['token' => $token]);

        return $stmt->fetch();
    }

    public static function findById(int $id)
    {
        $db = (new Database())->connect();

        $stmt = $db->prepare("SELECT * FROM Users WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public static function createNew(string $username, string $password): int
    {
        $db = (new Database())->connect();

        $stmt = $db->prepare('INSERT INTO Users (username, password) VALUES (:username, :password)');

        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $encryptedPassword);

        $stmt->execute();

        return $db->lastInsertId();
    }

    public static function setTokenToUser(array $user, string $token)
    {
        $db = (new Database())->connect();

        $query = "UPDATE Users SET token = :token WHERE id = :id";

        $stmt = $db->prepare($query);

        $stmt->bindParam(':id', $user['id']);
        $stmt->bindParam(':token', $token);

        $stmt->execute();
    }

    public static function updateUserCounter(int $userId, int $counter)
    {
        $db = (new Database())->connect();

        $query = "UPDATE Users SET counter = :counter WHERE id = :id";

        $stmt = $db->prepare($query);

        $stmt->bindParam(':id', $userId);
        $stmt->bindParam(':counter', $counter);

        $stmt->execute();
    }

    public static function generateToken(array $user): string
    {
        return md5(serialize($user));
    }
}
