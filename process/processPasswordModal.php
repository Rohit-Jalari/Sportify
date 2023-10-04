<?php
require('../config/dbCon.php');
require('../config/session.php');

// Retrieve the JSON data from the POST request
$requestData = json_decode(file_get_contents('php://input'));

if ($requestData && isset($requestData->tournamentID) && isset($requestData->code) && isset($requestData->email)) {

    $userID = $userRecord['userID'];
    $connection = $databaseCon;
    $tournamentID = $requestData->tournamentID;
    $code = $requestData->code;
    $email = $requestData->email;

    $searchData = searchCode($userID, $tournamentID, $code, $connection, $email);

    // Set the response content type to JSON
    header("Content-Type: application/json");
    echo json_encode($searchData);
} else {
    echo json_encode(['message' => 'Invalid request']);
}
function searchCode($userID, $tournamentID, $code, $connection, $email)
{
    // $userID = $userRecord['userID'];
    $filter = [
        'userID' => $userID,
        'authentication.tournamentID' => $tournamentID,
        'authentication.code' => $code,
    ];
    $userCollection = $connection->Users;
    $result = $userCollection->findOne($filter);

    if (isset($result['userID'])) {
        $userCriteria = [
            'userID' => $userID
        ];
        //update operation to unset the "authentication" field af
        $update = [
            '$unset' => [
                'authentication' => 1,
            ],
        ];
        // Update the document
        $updatedResult = $userCollection->updateOne($userCriteria, $update);

        if ($updatedResult->getModifiedCount() > 0) {
            $updateParticipateStatus = [
                '$set' => ["participatedTournaments.$tournamentID" => $email]
            ];
            $result = $userCollection->updateOne($userCriteria, $updateParticipateStatus);
            if ($result->getModifiedCount() > 0) {
                $participantCollection = $connection->Participants;
                $tournamentCriteria = [
                    'tournamentID' => $tournamentID
                ];
                $update = [
                    '$push' => ["userID" => $userID]
                ];
                $updateResult = $participantCollection->updateOne($tournamentCriteria, $update);
                if ($updateResult->getModifiedCount() > 0) {
                    $tournamentResult = $connection->Tournaments->findOne(["tournamentID" => $tournamentID]);
                    $_SESSION['participatedTournament'] = $tournamentResult;
                    $user = $userCollection->findOne(["userID" => $userID]);
                    $_SESSION['userRecord'] = $user;
                    $response = "success";
                    return $response;
                } else {
                    $response = "Couldnot update dB";
                    return $response;
                }
            } else {
                $response = "Couldnot update dB";
                return $response;
            }
        } else {
            $respone = "An Error Occurred";
            return $respone;
        }
    } else {
        $respone = 'Code doesnot matches';
        return $respone;
    }
}
?>