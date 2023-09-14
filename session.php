<?php
session_start();
if(isset($_SESSION['loggedIn'])) {
    $loggedIn = $_SESSION['loggedIn'];
    $userRecord = $_SESSION['userRecord'];
} else {
    $loggedIn = false;
    $userRecord = null;
}
?>