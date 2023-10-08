<?php
session_start();
require_once("../config/dbCon.php");

if (isset($_POST['gameID'])) {
    $ID = $_POST['gameID'];
    $result = $databaseCon->Games->findOne(["gameID" => $ID]);
    if ($result) {
        $_SESSION['gameDetail'] = $result;
        echo "success";
    }
} else {
    echo "Error: Game name not provided";
}
?>