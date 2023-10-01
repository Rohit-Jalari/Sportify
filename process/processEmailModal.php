<?php
require('../config/dbCon.php');
require('../config/session.php');

// Retrieve the JSON data from the POST request
$requestData = json_decode(file_get_contents('php://input'));

if ($requestData && isset($requestData->tournamentID) && isset($requestData->authenticatedMail)) {

    $userCollection = $databaseCon->Users;
    $tournamentID = $requestData->tournamentID;
    $authenticatedMail = $requestData->authenticatedMail;

    $accountData = searchAccount($tournamentID, $authenticatedMail, $userCollection);
    $response = ['message' => 'Email is already in use for authentication'];

    if ($accountData == 0) {
        $response = true;
    }

    // Set the response content type to JSON
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    echo json_encode(['message' => 'Invalid request']);
}
function searchAccount($tournamentID, $authenticatedMail, $userCollection)
{
    $filter = [
        "participatedTournaments.$tournamentID" => $authenticatedMail
    ];
    $result = $userCollection->countDocuments($filter);
    return $result;
}

?>