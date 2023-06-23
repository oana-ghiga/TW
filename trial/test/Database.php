<?php

class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        if (is_null(self::$connection)) {
            $config = require_once 'config.php';
            self::$connection = new PDO(
                'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'],
                $config['db']['user'],
                $config['db']['password']
            );
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }

    public static function execute($query, $params = [])
    {
        $statement = self::getConnection()->prepare($query);
        return $statement->execute($params);
    }

    public static function fetchOne($query, $params = [])
    {
        $statement = self::getConnection()->prepare($query);
        $statement->execute($params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function fetchAll($query, $params = [])
    {
        $statement = self::getConnection()->prepare($query);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function closeConnection()
    {
        self::$connection = null;
    }
}