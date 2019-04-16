<?php

namespace Component\DatabaseManager;

class QueryBuilder
{

    private $pdo;

    public function __construct($config)
    {
        $this->pdo = (new ConnectionManager)->connect($config);
    }

    public function query($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return true;
    }
    public function select($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }
    public function insert($sql)
    {
        $stmt = $this->pdo->exec($sql);

        return $this;
    }
}