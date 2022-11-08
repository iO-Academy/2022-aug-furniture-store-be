<?php

namespace Fsbe\DataAccess;

class Database
{
    private \PDO $pdo;
    private static ?Database $instance = null;

    private function __construct()
    {
        $host = 'db';
        $db = 'mockdatabase';
        $user = 'root';
        $pass = 'password';

        $dsn = "mysql:host=$host;dbname=$db";

        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }

    public static function getInstance(): Database
    {
        if (!self::$instance)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection(): \PDO
    {
        return $this->pdo;
    }

    public function fetch(string $sql, array $values = []): array
    {
        $statement = $this->pdo->prepare($sql);

        $statement->execute($values);

        return $statement->fetch();
    }

    public function fetchAll(string $sql, array $values = []): array
    {
        $statement = $this->pdo->prepare($sql);

        $statement->execute($values);

        return $statement->fetchAll();
    }
}