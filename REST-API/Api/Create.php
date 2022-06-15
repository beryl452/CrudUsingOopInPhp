<?php
   
    require_once('../vendor/autoload.php');

    use Exception\EmptydataException;
    use Exception\TypeAgeException;
    use Class\User;
    use Configuration\Database;

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
   
    
    $database = new Database();
    $user = new User( $database);
    $data = json_decode(file_get_contents("php://input"));
    try {
        if (!isset($data->name) && !isset($data->email) && !isset($data->age) && !isset($data->password)) {
            throw new EmptydataException();
         }
         else {
            try{
                if (!is_int($data->age)) {
                    throw new TypeAgeException();
                }
                else {
                    if($user->createUser(nameIn:$data->name, emailIn:$data->email, ageIn:$data->age, passwordIn:$data->password)){
                        http_response_code(201);
                        echo json_encode(array("message" => "User created"));
                    } else{
                        http_response_code(503);
                        echo json_encode(array("message" => "User could not be created."));
                    }                   
                }
            }
            catch(TypeAgeException $e){
                http_response_code(503);
                echo json_encode(array("message" => $e->getMessage()));
            }
        }
    } catch (EmptydataException $e) {
        echo json_encode(array("message" => $e->getMessage()));
    }