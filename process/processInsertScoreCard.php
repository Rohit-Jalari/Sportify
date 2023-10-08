<?php
require('../config/dbCon.php');
require('../config/session.php');

// Retrieve the JSON data from the POST request
$requestData = json_decode(file_get_contents('php://input'));

if ($requestData) {
    $gameID = $gameDetail['gameID'];
    $filter = [
        "gameID" => $gameID
    ];
    $response = "Some Error occurred";
    $update = ['$set' => ["JSONRepresentation" => $requestData]];
    $resultInsert = $databaseCon->ScoreCardInformation->updateOne($filter, $update);
    if ($resultInsert->getModifiedCount() > 0) {
        $response = "success";
    } else {
        $response = "failed";
    }
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    echo json_encode('INVALID REQUEST!!!');
}