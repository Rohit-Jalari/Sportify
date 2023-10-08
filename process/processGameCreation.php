<?php
require('../config/dbCon.php');
require('../config/session.php');

// Retrieve the JSON data from the POST request
$requestData = json_decode(file_get_contents('php://input'));

if ($requestData && isset($requestData->gameName)) {

    $requestData = (array) $requestData;
    $gameCollection = $databaseCon->Games;
    $tournamentID = $participatedTournament['tournamentID'];
    $gameID = generateID(12);
    $requestData['tournamentID'] = $tournamentID;
    $requestData['gameID'] = $gameID;

    $response = "Insertion Failed";

    $insertResult = $gameCollection->insertOne($requestData);
    if ($insertResult->getInsertedCount() > 0) {
        $gameParticipationCollection = $databaseCon->GamesParticipation;
        $data = [
            "gameID" => $gameID,
            "participationDetail" => [],
            "announcement" => []
        ];
        $insertResult = $gameParticipationCollection->insertOne($data);
        if ($insertResult->getInsertedCount() > 0) {
            $bracketCollection = $databaseCon->BracketInformation;
            $data = [
                "gameID" => $gameID,
                "JSONRepresentation" => new stdClass(),
            ];
            $bracketInsert = $bracketCollection->insertOne($data);
            if ($bracketInsert->getInsertedCount() > 0) {
                $ScoreCardCollection = $databaseCon->ScoreCardInformation;
                $data = [
                    "gameID" => $gameID,
                    "JSONRepresentation" => new stdClass(),
                ];
                $scoreCardInsert = $ScoreCardCollection->insertOne($data);
                if ($bracketInsert->getInsertedCount() > 0) {
                $response = "success";
                }
            }
        }
    }
    // Set the response content type to JSON
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    echo json_encode("Invalid request");
}
function generateID($length)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }
    return '#' . str_shuffle($password);
}
?>