<?php

require_once('../vendor/autoload.php');

use Class\User;
use Configuration\Database;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isset($_GET['id']) &&  !empty($_GET['id']) && is_int($_GET['id'])) {
    $dataBase = new Database();
    $users = new User($dataBase);
    $getUser = $users->getUser(htmlspecialchars(strip_tags($_GET["id"])));
    $rowCount = $getUser->rowCount();

    echo json_encode($rowCount);
    if ($rowCount > 0) {
        $userArr = array();
        $userArr["body"] = array();
        $userArr["rowCount"] = $rowCount;
        while ($row = $getUser->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "age" => $age,
                "password" => $password
            );
            array_push($userArr["body"], $e);
        }
        echo json_encode($userArr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
