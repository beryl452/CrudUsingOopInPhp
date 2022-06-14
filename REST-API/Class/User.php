<?php

namespace Class;

use Configuration\Database;
use Class\Interface\CrudUser;

class User implements CrudUser
{
    private $dataBaseTable = "users";

    private $connection;

    private int $idUser;
    private string $nameUser;
    private string $emailUser;
    private int $ageUser;
    private string $passwordUser;
    
    
    public function __construct(Database $connectionDataBase){
        $this->connection = $connectionDataBase->getConnection();
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM ". $this -> dataBaseTable;
        $query = $this->connection->prepare($sql);
        $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->execute();
        return $query;
    }
}