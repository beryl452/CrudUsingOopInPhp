<?php

namespace Class;

use Configuration\Database;
use Class\Interface\CrudUserInterface;

class User implements CrudUserInterface
{
    private $dataBaseTable = "users";

    private $connection;

    private int $idUser;
    private string $nameUser;
    private string $emailUser;
    private int $ageUser;
    private string $passwordUser;


    public function __construct(Database $connectionDataBase)
    {
        $this->connection = $connectionDataBase->getConnection();
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM " . $this->dataBaseTable;
        $query = $this->connection->prepare($sql);
        $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->execute();
        return $query;
    }

    public function getUser(int $idIn)
    {
        $this->id = htmlspecialchars(strip_tags($idIn));
        $sql = "SELECT * FROM " . $this->dataBaseTable . " WHERE id = :idUser";
        $query = $this->connection->prepare($sql);
        $query->bindParam(":idUser", $this->id);
        $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->execute();
        return $query;
    }

    public function createUser(string $nameIn, string $emailIn, int $ageIn, string $passwordIn ){
        $this->name = htmlspecialchars(strip_tags($nameIn));
        $this->email = htmlspecialchars(strip_tags($emailIn));
        $this->age = htmlspecialchars(strip_tags($ageIn));
        $this->password = htmlspecialchars(strip_tags($passwordIn));

        $this->password =  password_hash($this->password, PASSWORD_ARGON2ID);

        $sql = "INSERT INTO `". $this->dataBaseTable . "`(`name`, `email`, `age`, `password`)" . " VALUES('" . 
        $this->name . "', '" . $this->email . "', '" . $this->age . "', '" . $this->password . "')";
        $query = $this->connection->prepare($sql); 
        $query->execute();
        return $query;
    }
}
