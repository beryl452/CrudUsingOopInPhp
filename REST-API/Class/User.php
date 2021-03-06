<?php

namespace Class;

use Configuration\Database;
use Class\Interface\CrudUserInterface;

class User implements CrudUserInterface
{
    private $dataBaseTable = "users";

    private $connection;

    private int $id;
    private string $name;
    private string $email;
    private int $age;
    private string $password;


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

    public function createUser(string $nameIn, string $emailIn, int $ageIn, string $passwordIn)
    {
        $this->name = htmlspecialchars(strip_tags($nameIn));
        $this->email = htmlspecialchars(strip_tags($emailIn));
        $this->age = htmlspecialchars(strip_tags($ageIn));
        $this->password = htmlspecialchars(strip_tags($passwordIn));

        $this->password =  password_hash($this->password, PASSWORD_ARGON2ID);

        $sql = "INSERT INTO `" . $this->dataBaseTable . "`(`name`, `email`, `age`, `password`)" . " VALUES('" .
            $this->name . "', '" . $this->email . "', '" . $this->age . "', '" . $this->password . "')";
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query;
    }

    public function updateUser(int $idIn, string $nameIn, string $emailIn, int $ageIn, string $passwordIn)
    {
        $this->id = htmlspecialchars(strip_tags($idIn));
        $this->name = htmlspecialchars(strip_tags($nameIn));
        $this->email = htmlspecialchars(strip_tags($emailIn));
        $this->age = htmlspecialchars(strip_tags($ageIn));
        $this->password = htmlspecialchars(strip_tags($passwordIn));

        $this->password =  password_hash($this->password, PASSWORD_ARGON2ID);

        $sql = "UPDATE " . $this->dataBaseTable .
            " SET " .
            " name = '" . $this->name . "', email = '" . $this->email . "', age = " . $this->age . ", password = '" . $this->password .
            "' WHERE " . "id = " . $this->id;
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query;
    }

    public function deleteUser(int $idIn)
    {
        $this->id = htmlspecialchars(strip_tags($idIn));
        $sql = "DELETE FROM " . $this->dataBaseTable . " WHERE id = :idUser";
        $query = $this->connection->prepare($sql);
        $query->bindParam(":idUser", $this->id);
        $query->execute();
        return $query;
    }
// assert

public function getidUser(){
    return $this->id;
}
public function getnameUser(){
    return $this->name;
}
public function getemailUser(){
    return $this->email;
}
public function getageUser(){
    return $this->age;
}
}
