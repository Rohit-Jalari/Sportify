<?php
require('../config/session.php');
?>

<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
    <?php include('../includes/head.php'); ?>
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core-dark.css">
    <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css">
    <style>
        .row input:focus {
            border-color: #696cff;
        }
    </style>
    <script src="../assets/vendor/js/bootstrap.js"></script>
</head>

<body>
    <?php
    require_once('../config/dbCon.php');
    include('../includes/errorModal.php');

    // print_r($userRecord);

    //checks if Login buttons is clicked or not
    if (isset($_POST['submit']) && $_POST['submit'] == 'submit') {
        $tournamentName = htmlspecialchars($_POST['tournamentName']);
        $tournamentCreator = $userRecord['userID'];
        $startDate = htmlspecialchars($_POST['startDate']);
        $endDate = htmlspecialchars($_POST['endDate']);
        $location = htmlspecialchars($_POST['location']);
        $description = htmlspecialchars($_POST['description']);
        $emailRestriction = htmlspecialchars($_POST['emailRestriction']);
        $emailRestriction = ($emailRestriction != '') ? $emailRestriction : null;
        //collection
        $tournamentCollection = $databaseCon->Tournaments;

        do {
            $tournamentID = generateID(12);
            $tournamentIDFilter = ['tournamentID' => $tournamentID];
            $tournamentIDMatch = $tournamentCollection->countDocuments($tournamentIDFilter);
        } while ($tournamentIDMatch != 0);

        // echo $tournamentName. '  '. $tournamentCreator. '  '. $startDate.'  '. $endDate . '  '. $emailRestriction ;
        $tournamentDetail = [
            'tournamentName' => $tournamentName,
            'tournamentID' => $tournamentID,
            'tournamentCreator' => $tournamentCreator,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'location' => $location,
            'description' => $description,
            'emailRestriction' => $emailRestriction
        ];
        $session = $mongoClient->startSession();

        try {
            $session->startTransaction();

            // Insert operation
            $insertResult = $tournamentCollection->insertOne($tournamentDetail);

            if ($insertResult->getInsertedCount() <= 0) {
                throw new Exception("Insert failed");
            }

            //user collection
            $userCollection = $databaseCon->Users;
            //upadate tournament-created by user info
            $updateFilter = ['userID' => $tournamentCreator];
            $update = ['$set' => ['tournamentID' => $tournamentID]];
            $updateResult = $userCollection->updateOne($updateFilter, $update);
            $_SESSION['userRecord'] = $userCollection->findOne($updateFilter);

            if ($updateResult->getModifiedCount() <= 0) {
                throw new Exception("Update failed");
            }

            $_SESSION['tournamentDetail'] = $tournamentDetail;
            $participantData = [
                "tournamentID" => $tournamentID,
                "userID" => null
            ];
            $participantInsert = $databaseCon->Participants->insertOne($participantData);
            $session->commitTransaction();
    ?>
            <script>
                location.replace("tournamentIndex.php");
            </script>
        <?php
        } catch (Exception $e) {

            $session->abortTransaction();
        ?>
            <script>
                let myModal = new bootstrap.Modal(document.getElementById('errorModalToggle'));
                myModal.show();
            </script>
    <?php
        } finally {
            $session->endSession();
        }
    }
    function generateID($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }
        return '#' . str_shuffle($password);
    }
    ?>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/aside.php') ?>

            <div class="layout-page">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Modal if Not logged in-->
                        <?php include('../includes/loginModal.php') ?>
                        <div class="row">
                            <div class="col-x1">
                                <div class="card mb-4">
                                    <div class="col-sm-6 p-4" style="display: flex; justify-content: space-between; align-items: center;">
                                        <h3>Open Participate:</h3>
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" />
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            <span class="switch-label" style="margin-left: 8px;"></span>
                                        </label>
                                    </div>
                                    <div class="d-grid gap-2 col-2 mx-auto">
                                        <button class="btn btn-primary btn-lg" type="button">Save</button>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <h2>Game Name</h2>
                                    <p>#123456789</p>
                                    <h3>Game Type</h3>
                                    <h3>Male/Female</h3>
                                    <h3>Date</h3>
                                    <h3>Rule</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</body>
<?php include('../includes/script.php') ?>

<?php if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) { ?>
    <script>
        var myModal1 = new bootstrap.Modal(document.getElementById('loginModalToggle'));
        window.addEventListener('load', () => {
            myModal1.show();
        });
    </script>
<?php } ?>
<script type="text/javascript">
    document.getElementById('advanceSetting').addEventListener('change', function() {
        let advanceSetting = document.querySelector('#advanceSetting');
        var emailRestriction = document.querySelector('.email-restriction');
        var emailRestrictionField = document.querySelector('#emailRestriction');
        if (advanceSetting.checked) {
            emailRestriction.style.height = '5rem';
            emailRestrictionField.setAttribute('required', '');
        } else {
            emailRestriction.style.height = '0';
            emailRestrictionField.removeAttribute('required');
        }
    });
</script>
<script src="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $("#bs-datepicker-daterange").datepicker({
        format: "yyyy/mm/dd"
    });
</script>
<script type="text/javascript">
    document.getElementById("formSubmit").addEventListener('click', () => {
        console.log('clicked');
    });
</script>
<script type="text/javascript">
    //snippet from stackoverflow to prevent auto submission of form after refresh
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>


</html>