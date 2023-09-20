<?php
require 'vendorMongo/autoload.php';
$databaseName = 'Sportify';

$mongoClient = new MongoDB\Client;
if ($mongoClient) {
    $databaseCon = $mongoClient->$databaseName;
    ?>
    <script>
        console.log("Connection Succesful");
    </script>
    <?php
} else {?>
    <script>
        console.log("Connection Error");
    </script>
    <?php
    echo "Connection Error";
}
?>