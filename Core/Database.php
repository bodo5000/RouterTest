<?php

namespace Core;

use PDO;
use PDOStatement;

class DataBase
{
    public $connection;

    public PDOStatement $statement;

    public function __construct($config, $userName = 'root', $password = '')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        // dd(http_build_query($config, '', ';'));
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $this->connection = new PDO($dsn, $userName, $password, $options);
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function fetchOrFail()
    {
        $result =  $this->find();

        if (!$result) abort();

        return $result;
    }
}
