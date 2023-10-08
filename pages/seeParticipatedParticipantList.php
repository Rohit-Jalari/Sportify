<?php
require('../config/session.php');
require('../config/dbCon.php');
?>
<!DOCTYPE html>
<html>
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
        "gameID" => $gameDetail["gameID"]
    ];
    $result = $databaseCon->GamesParticipation->findOne($filter);
    $resultList = $result['participationDetail'];
    ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/participatedGameAside.php') ?>
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
                                                    foreach ($resultList as $game) { ?>
                                                        <tr class="mb-3">
                                                            <!-- First Column -->
                                                            <td class="col-sm-11">
                                                                <!-- First Row in the First Column -->
                                                                <div class="row">
                                                                    <div>
                                                                        <h4>
                                                                            
                                                                            <?php echo($game['Name']);
                                                                             //ucfirst($game); ?>
                                                                        </h4>
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
        </div>
    </div>
</body>
<?php include('../includes/script.php') ?>
<?php if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) { ?>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('loginModalToggle'));
        window.addEventListener('load', () => {
            myModal.show();
        });
    </script>
<?php } ?>

<script src="../assets/vendor/libs/jquery/jquery.js"></script>



</html>