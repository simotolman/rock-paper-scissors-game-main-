<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../database.php';
    include_once '../score.php';

    $database = new Database();
    $db = $database->connect();

    $score = new Score($db);

    $result = $score->read();

    $score_res = $result->fetch(PDO::FETCH_ASSOC);

    if ($score_res) {
        echo json_encode($score_res);
    }
    else {
        echo json_encode(
            array('message' => 'No Score Found')
        );
    }


    
