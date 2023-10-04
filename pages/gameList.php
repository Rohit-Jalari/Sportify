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
            <div class="layout-page" style="height: 150vh">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php require('../includes/gameModal.php'); ?>
                        <div class="row">
                            <div class="col-x1">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-center align-items-center">
                                        <div class="gap-2">
                                            <button class="btn btn-primary" style="width: 10rem;" type="button"
                                                id="addGames">Add
                                                Game</button>
                                        </div>

                                        <!-- Separate box for "Game Name" -->
                                    </div> <!-- Separate box for the entire content -->
                                </div>
                            </div>
                            <div class="col-x1">
                                <div class="gap-2">
                                    <label class="form-label">
                                        <h2>
                                            Game List
                                        </h2>
                                    </label>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body mt-2">
                                        <div class="table-responsive">
                                            <table class="table table-dark">
                                                <tbody>
                                                    <tr class="mb-3">
                                                        <!-- First Column -->
                                                        <td class="col-sm-11">
                                                            <!-- First Row in the First Column -->
                                                            <div class="row">
                                                                <div>
                                                                    <h2>
                                                                        Game Name
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                            <!-- Second Row in the First Column -->
                                                            <div class="row">
                                                                <div>
                                                                    <h4>
                                                                        Game Type <i class='bx bx-football'></i>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <!-- Third Row in the First Column -->
                                                            <div class="row">
                                                                <div>
                                                                    <h4>
                                                                        Gender
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- Second Column -->
                                                        <td class="col-sm-1">
                                                            <div class="row mb-3">
                                                                <div>
                                                                    <button class="btn btn-primary" style="width: 4rem;"
                                                                        type="button" id="editGames">
                                                                        Edit
                                                                    </button>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div>
                                                                    <button class="btn btn-primary" style="width: 4rem;"
                                                                        type="button" id="seeGames">
                                                                        See
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <!-- First Column -->
                                                        <td class="col-sm-11">
                                                            <!-- First Row in the First Column -->
                                                            <div class="row">
                                                                <div>
                                                                    <h2>
                                                                        Game Name
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                            <!-- Second Row in the First Column -->
                                                            <div class="row">
                                                                <div>
                                                                    <h4>
                                                                        Game Type <i class='bx bx-football'></i>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <!-- Third Row in the First Column -->
                                                            <div class="row">
                                                                <div>
                                                                    <h4>
                                                                        Gender
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- Second Column -->
                                                        <td class="col-sm-1">
                                                            <div class="row mb-3">
                                                                <div>
                                                                    <button class="btn btn-primary" style="width: 4rem;"
                                                                        type="button" id="editGames">
                                                                        Edit
                                                                    </button>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div>
                                                                    <button class="btn btn-primary" style="width: 4rem;"
                                                                        type="button" id="seeGames">
                                                                        See
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        // print_r($_SESSION['userRecord']);
                        // print_r($tournamentDetail);
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

<script type="text/javascript">
    var gameModal = new bootstrap.Modal(document.getElementById('gameModalToggle'));
    document.getElementById('addGames').addEventListener('click', () => {
        gameModal.show();
    });
</script>
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $("#bs-datepicker-daterange").datepicker({
        format: "yyyy/mm/dd"
    });
</script>
<script type="text/javascript" src="../assets/vendor/libs/cleave/Cleave.min.js"></script>
<script type="text/javascript" src="../assets/vendor/libs/block-ui/block-ui.js"></script>

</html>