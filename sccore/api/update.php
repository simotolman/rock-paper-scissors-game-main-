<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../database.php';
    include_once '../score.php';

    $database = new Database();
    $db = $database->connect();

    $score = new Score($db);

    $data = json_decode(file_get_contents("php://input"));

    
    
    if ($data->id) {
        $score->id = $data->id;
        $score->score = $data->score;
        if($score->update()) {
            echo json_encode(
                array('message' => 'Score Updated')
            );
        } else {
            echo json_encode(
                array('message' => 'Score Not Updated')
            );
        }
    }  else {
        echo json_encode(
            array('message' => 'ID Not Found')
        );
    }
