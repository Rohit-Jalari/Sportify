<?php
require('../config/session.php');
?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">


<head>
    <?php include('../includes/head.php'); ?>
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core-dark.css">
    <style>
        input {
            height: 3rem;
        }

        h6 {
            color: #cbcbe2;
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/participatedTournamentAside.php') ?>
            <div class="layout-page">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php require('../includes/gameModal.php'); ?>
                        <div class="card text-center" style="border: 1px solid #444564;">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <?= $participatedTournament['tournamentName']; ?>
                                </h3>
                                <p class="card-text" style="text-align:justify;display:flex;justify-content:center;">
                                    <?= $participatedTournament['tournamentID']; ?>
                                </p>
                                <p class="card-text text-white" style="text-align:justify;display:flex;justify-content:center;">
                                    <?= $participatedTournament['description']; ?>
                                </p>
                                <p class="card-text text-white" style="text-align:justify;display:flex;justify-content:center;">
                                    Date :
                                    <?= $participatedTournament['startDate'] . "&#8212;" . $participatedTournament['endDate']; ?>
                                </p>
                                <p class="card-text text-white" style="text-align:justify;display:flex;justify-content:center;">
                                    Location :
                                    <?= $participatedTournament['location']; ?>
                                </p>
                                <p class="card-text text-white" style="text-align:justify;display:flex;justify-content:center;">
                                    Email-Restriction :
                                    <?php
                                    $location = ($participatedTournament['emailRestriction'] == null) ? "None" : $participatedTournament['emailRestriction'];
                                    echo $location;
                                    ?>
                                    </span>
                                </p>
                            </div>
                        </div>
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

<script type="text/javascript">
</script>
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

</script>
<script type="text/javascript" src="../assets/vendor/libs/cleave/Cleave.min.js"></script>
<script type="text/javascript" src="../assets/vendor/libs/block-ui/block-ui.js"></script>

</html>