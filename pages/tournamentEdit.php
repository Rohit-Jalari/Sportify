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
    <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css">
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/tournamentAside.php') ?>

            <div class="layout-page" style="height: 150vh">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Modal if Not logged in-->
                        <?php include('../includes/loginModal.php') ?>
                        <div class="row">
                            <div class="col-x1">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h1 class="mb-0">Update Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="formTournament" class="mb-3" action="" method="POST">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="tournamentName" class="form-label">Name</label>
                                                    <input type="text" id="tournamentName" class="form-control"
                                                        placeholder="Enter Name" name="tournamentName" required>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <div class="mb-3">
                                                        <label for="date" class="form-label">Date
                                                        </label>

                                                        <div class="input-group input-daterange"
                                                            id="bs-datepicker-daterange">
                                                            <input id="date" type="text" placeholder="YYYY/MM/DD"
                                                                class="form-control" name="startDate" required>
                                                            <span class="input-group-text">to</span>
                                                            <input type="text" placeholder="YYYY/MM/DD"
                                                                class="form-control" name="endDate" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cpl mb-3">
                                                    <label for="location" class="form-label ">Location</label>
                                                    <input type="text" id="location" class="form-control"
                                                        placeholder="Enter location" name="location" required>
                                                </div>
                                                <div class="cpl mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea id="description" class="form-control"
                                                        placeholder="Enter Description of the Tournament"
                                                        name="description" rows="4" style="color:white;"
                                                        required></textarea>
                                                </div>

                                                <div class="d-flex">
                                                    <h5 class="title" id="TopTitle">Advance Setting</h5>
                                                    <div class="mb-3 ms-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="advanceSetting" name="advanceSetting">
                                                            <label class="form-check-label" for="advanceSetting">Enable
                                                                Email-Domain
                                                                Restriction</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cpl mb-3">
                                                    <div class="email-restriction"
                                                        style="height:0px;overflow:hidden;transition:0.5s ease;">
                                                        <label for="emailRestriction" class="form-label">Email-Domain
                                                            Restriction
                                                        </label>
                                                        <input type="text" class="form-control" id="emailRestriction"
                                                            placeholder="@example.com" name="emailRestriction"
                                                            pattern="^@[a-zA-Z0-9]*\.[\w\d]+[\.\w\d]*">
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="formSubmit" class="btn btn-primary" name="submit"
                                                value="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
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