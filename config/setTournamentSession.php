<?php
session_start();
require_once("../config/dbCon.php");

if (isset($_POST['tournamentID'])) {
    $ID = $_POST['tournamentID'];
    $result = $databaseCon->Tournaments->findOne(["tournamentID" => $ID]);
    if ($result) {
        $_SESSION['participatedTournament'] = $result;
        echo "Session variable set successfully";
    }
} else {
    echo "Error: Tournament name not provided";
}
?>