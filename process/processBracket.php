<?php
require('../config/dbCon.php');
require('../config/session.php');

$gameID = $gameDetail['gameID'];
$gameName = $gameDetail['gameName'];
$filter = ['gameID' => $gameID];
$result = $databaseCon->GamesParticipation->findOne($filter);

if ($result) {
    $namesArray = [];
    foreach ($result['participationDetail'] as $participant) {
        $namesArray[] = $participant['Name'];
    }
    shuffle($namesArray);
    $data = [$gameName,$namesArray];
    echo json_encode($data);
} else {
    echo json_encode("Error");
}
