<?php
require('../config/dbCon.php');
require('../config/session.php');

// Retrieve the JSON data from the POST request
$requestData = json_decode(file_get_contents('php://input'));

if ($requestData && isset($requestData->tournamentID) && isset($requestData->authenticatedMail)) {

    $userCollection = $databaseCon->Users;
    $tournamentID = $requestData->tournamentID;
    $authenticatedMail = $requestData->authenticatedMail;
    $userID = $userRecord['userID'];
    $code = generateCode(5);

    if (sendMail($authenticatedMail, $code)) {
        $data = [
            "tournamentID" => $tournamentID,
            "authenticatedMail" => $authenticatedMail,
            "code" => $code
        ];
        $filter = ['userID' => $userID];
        $insert = [
            '$set' => ['authentication' => $data]
        ];
        $result = $userCollection->updateOne($filter, $insert);
        if ($result->getModifiedCount() > 0) {
            // Set the response content type to JSON
            header("Content-Type: application/json");
            echo json_encode(['message' => 'success']);
        } else {
            echo json_encode(['message' => 'Couldnot update dB']);
        }
    } else {
        echo json_encode(['message' => 'Mail could not be sent']);
    }
}

function generateCode($length)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }
    return str_shuffle($password);
}
function sendMail($to, $code)
{
    $subject = "Verify your Account";
    $message = "Verification Code :" . $code;
    if (mail($to, $subject, $message)) {
        return true;
    } else {
        return false;
    }
}
?>