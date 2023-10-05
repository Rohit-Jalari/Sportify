<?php
session_start();
require_once("../config/dbCon.php");

if (isset($_POST['gameID'])) {
    $ID = $_POST['gameID'];
    $result = $databaseCon->Games->findOne(["gameID" => $ID]);
    if ($result) {
        $_SESSION['gameDetail'] = $result;
        echo "Session variable set successfully";
    }
} else {
    echo "Error: Tournament name not provided";
}
?>