<?php

namespace Class\Interface;

interface CrudUserInterface
{
    public function getUsers();
    public function getUser(int $idIn);
    public function createUser(string $nameIn, string $emailIn, int $ageIn, string $passwordIn );
    public function updateUser(int $idIn, string $nameIn, string $emailIn, int $ageIn, string $passwordIn);
}