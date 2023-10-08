<?php
require('../config/dbCon.php');
require('../config/session.php');

// Retrieve the JSON data from the POST request
$requestData = json_decode(file_get_contents('php://input'));

if ($requestData && isset($requestData->tournamentID)) {
    
    $tournamentCollection = $databaseCon->Tournaments;
    $tournamentID = $requestData->tournamentID;

    // actual searching in database
    $tournamentData = searchTournament($tournamentID, $tournamentCollection);

    $response = ['message' => 'Tournament not found'];
    

    if ($tournamentData) {
        // var_dump($tournamentData);
        $response = $tournamentData;
    }

    // Set the response content type to JSON
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    echo json_encode(['message' => 'Invalid request']);
}

function searchTournament($tournamentID, $tournamentCollection)
{
    $searchFilter = ['tournamentID' => $tournamentID];
    $tournament = $tournamentCollection->findOne($searchFilter);
    // var_dump($tournament['tournamentID']);
    if (isset($tournament['tournamentID'])) {
        $_SESSION['participatedTournament'] = $tournament;
        return $tournament;
        // return "FOund";
    } else {
        return false;
    }
}
?>