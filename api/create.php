<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/users.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Users($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->name = $data->name;
    $item->email = $data->email;
    $item->gender = $data->gender;
    $item->status = $data->status;
    
    if($item->createUsers()){
        echo 'User created successfully.';
    } else{
        echo 'User could not be created.';
    }
?>