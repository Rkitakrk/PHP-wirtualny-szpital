<?php

namespace Component\DatabaseManager;

class ConnectionManager
{

    private $pdo;

    public function connect($config)
    {
        try{
            $pdo = new \PDO('mysql:host='.$config['host'].';dbname='.$config['name'].';charset=utf8', $config['user'], $config['password']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        } catch(\PDOException $e)
        {
            throw new \PDOException('Połączenie nie mogło zostać utworzone: ' . $e->getMessage());
        }

        return $this->pdo;
    }
}