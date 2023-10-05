<?php
require '../vendor/vendorMongo/autoload.php';
require_once('dbCon.php');
session_start();
if(isset($_SESSION['loggedIn'])) {
    $loggedIn = $_SESSION['loggedIn'];
    $userRecord = $_SESSION['userRecord'];
} else {
    $loggedIn = false;
    $userRecord = null;
}
if(isset($_SESSION['participatedTournament'])) {
    $participatedTournament = $_SESSION['participatedTournament'];
} else {
    $participatedTournament = null;
}
if(isset($_SESSION['gameDetail'])) {
    $gameDetail = $_SESSION['gameDetail'];
} else {
    $gameDetail = null;
}
?>