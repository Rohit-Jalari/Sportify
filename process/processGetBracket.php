<?php
require('../config/dbCon.php');
require('../config/session.php');

$gameID = $gameDetail['gameID'];
$filter = [
    "gameID" => $gameID
];
$response = "Some Error occurred";
$result = $databaseCon->BracketInformation->findOne($filter);
if ($result) {
    $data = $result['JSONRepresentation'];
    $response = ["message" => "success", "data" => $data];
} else {
    $response = ["messsage" => "failed"];
}
$jsonString = json_encode($response);
header("Content-Type: application/json");
// $decodedArray = json_decode($jsonString, true);
echo $jsonString;