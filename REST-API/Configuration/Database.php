<?php

namespace Configuration;

use Exception\FailedToLoginException;

class Database
{
    private $host = 'localhost';
    private $dataBaseName = 'test';
    private $dataBaseUser = 'root';
    private $dataBasePassword = '';
    private $charset = 'utf8';
    private $dsn = '';
    protected $connection;

    public function __construct()
    {
        try {

            $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dataBaseName . ";charset=" . $this->charset;
            $this->connection = new \PDO($this->dsn, $this->dataBaseUser, $this->dataBasePassword);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch (FailedToLoginException $e) {
            echo "Error Message: " . $e->getMessage();
        }
    }
}
