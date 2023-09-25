<?php
require '../vendor/vendorMongo/autoload.php';
$databaseName = 'Sportify';

$mongoClient = new MongoDB\Client;
if ($mongoClient) {
    $databaseCon = $mongoClient->$databaseName;
    
} else {?>
    <script>
        console.log("Connection Error");
    </script>
    <?php
    echo "Connection Error";
}
?>