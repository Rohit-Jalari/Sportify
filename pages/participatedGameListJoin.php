<?php
require('../config/session.php');
require('../config/dbCon.php');
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">
    
<head>
    <?php include('../includes/head.php'); ?>
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core-dark.css">
    <link rel="stylesheet" href="../assets/css/error.css">
    <style>
        input {
            height: 3rem;
        }

        h6 {
            color: #cbcbe2;
            margin-bottom: 0;
        }

        .playerNumber {
            /* display: none; */
            overflow: hidden;
            height: 0;
            transition: 0.5s ease;
        }
    </style>
</head>

<body>
    <?php
    $filter = [
        "tournamentID" => $participatedTournament["tournamentID"]
    ];
    $resultGameList = $databaseCon->Games->find($filter);
    ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/participatedTournamentAside.php') ?>
            <div class="layout-page">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-x1">
                                <div class="gap-2">
                                    <label class="form-label">
                                        <h3>
                                            Game List
                                        </h3>
                                    </label>
                                </div>
                                
                                <div class="card mb-4">
                                    <div class="card-body mt-2">
                                        <div class="table-responsive">
                                            <table class="table table-dark">
                                                <tbody>
                                                    <?php
                                                    foreach ($resultGameList as $game) { ?>
                                                        <tr class="mb-3">
                                                            <!-- First Column -->
                                                            <td class="col-sm-11">
                                                                <!-- First Row in the First Column -->
                                                                <div class="row">
                                                                    <div>
                                                                        <h4>
                                                                            <?= ucfirst($game['gameName']); ?>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div>
                                                                        <h6>
                                                                            <?= $game['gameID']; ?>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                                <!-- Second Row in the First Column -->
                                                                <div class="row">
                                                                    <div>
                                                                        <h4>
                                                                            <?= ucfirst($game['gameType']); ?> <i
                                                                                class='bx bx-<?= $game['gameType']; ?>'></i>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <!-- Third Row in the First Column -->
                                                                <div class="row">
                                                                    <div>
                                                                        <h4>
                                                                            <?= ucfirst($game['gender']); ?>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <!-- Second Column -->
                                                            <td class="col-sm-1">
                                                                <?php
                                                                if ($userRecord !== null) { ?>
                                                                    <div class="row mb-3">
                                                                        <div>
                                                                            <button class="btn btn-primary" style="width: 4rem;"
                                                                                type="button" onclick="joinGame(this)"
                                                                                id="joinGames"
                                                                                data-gameid="<?= $game['gameID']; ?>"
                                                                                <?php if($game['gender']!= $userRecord['gender'] && $game['gender']!= 'open') {?>
                                                                                    disabled
                                                                                <?php } ?>
                                                                                >
                                                                                Join
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>

                                                                <div class="row">
                                                                    <div>
                                                                        <button class="btn btn-primary" style="width: 4rem;"
                                                                            type="button" onclick="seeGame(this)"
                                                                            id="seeGames"
                                                                            data-gameid="<?= $game['gameID']; ?>">
                                                                            See
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        // print_r($_SESSION['userRecord']);
                        print_r($gameDetail);
                        ?>
                    </div>
                </div>
            </div>
            <!--Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
            <?php include('../includes/joinGameModal.php');?>
        </div>
    </div>
</body>
<?php include('../includes/script.php') ?>
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script type="text/javascript" src="../assets/vendor/libs/cleave/Cleave.min.js"></script>
<script type="text/javascript" src="../assets/vendor/libs/block-ui/block-ui.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        var joinGameModal = new bootstrap.Modal(document.getElementById('joinGameModalToggle'));
        joinGameModal.show();
        var closeModal = document.getElementById('closeModal');
        closeModal.addEventListener('click', () => {
            location.replace('participatedGamelist.php');
        })
    });
</script>

</html>