<?php
require('../config/session.php');
?>

<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
    <?php include('../includes/head.php'); ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/aside.php') ?>

            <div class="layout-page" style="height: 150vh">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?php include('../includes/loginModal.php') ?>
                        <div class="row">
                            <div class="col-x1">

                                <form id="form" class="mb-3" action="" method="POST">
                                    <div class="mb-3 Input">
                                        <label for="gamename" class="form-label">Game Name</label>
                                        <input type="text" class="form-control" id="gamename" name="gamename" placeholder="Enter game name">
                                    </div>

                                    <label for="gametype" class="form-label">Game Type</label>

                                    <div class="mb-3 Input">
                                        <div class="btn-group me-3">

                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Select Game
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Football</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Race(single)</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="mb-3 Input">
                                        <label for="gamerule" class="form-label">Game Rule</label>
                                    </div>

                                    <div class="mb-3 Input">
                                        <label for="genderpreference" class="form-label">Gender Preference</label>
                                    </div>
                                    <div class="btn-group me-3">

                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select a Gender
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Male</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Female</a></li>
                                        </ul>
                                    </div>

                                    <div class="mb-3 Input">
                                        <label for="maxplayer" class="form-label">Maximun Number of Players</label>
                                        <input type="text" class="form-control" id="maxplayer" name="maxplayer" placeholder="Enter Maximum Number of Players">
                                    </div>

                                    <div class="mb-3 Input">
                                        <label for="mixplayer" class="form-label">Minimun Number of Players</label>
                                        <input type="text" class="form-control" id="minplayer" name="minplayer" placeholder="Enter Minimum Number of Players">
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Date</label>

                                                <div class="input-group input-daterange" id="bs-datepicker-daterange">
                                                    <input id="date" type="text" placeholder="YYYY/MM/DD" class="form-control" name="startDate" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-2 mx-auto">
                                        <button class="btn btn-primary btn-lg" type="button">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</body>
<?php include('../includes/script.php') ?>
<script src="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $("#bs-datepicker-daterange").datepicker({
        format: "yyyy/mm/dd"
    });
</script>

</html>