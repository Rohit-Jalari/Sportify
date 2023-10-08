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
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/participatedGameAside.php') ?>

            <div class="layout-page">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="col-x1">
                            <h1 class="mb-3 mt-3">Announcement</h1>
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">

                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center"
                                    style="height:50vh;">
                                    <h3>There is no Announcement yet</h3>
                                </div>
                            </div>
                            <!-- Separate box for "Game Name" -->
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

</html>