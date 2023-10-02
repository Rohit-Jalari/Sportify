<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
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
function sendMail($authenticatedMail, $code)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'be2019se691@gces.edu.np';
        $mail->Password = 'zgloclcdlwxocdgd'; //2SV then app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient details
        $mail->setFrom('be2019se691@gces.edu.np', 'SPORTIFY');
        $mail->addAddress($authenticatedMail, 'User');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Verify your account using following Code';
        $mail->Body = 'Code : '.$code;

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>