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
            <?php include('../includes/createdGameAside.php') ?>

            <div class="layout-page">
                <?php include('../includes/navbar.php') ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="col-x1">
                            <h1 class="mb-3 mt-3">Live Updates</h1>
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">

                                </div>
                                <?php if ($gameDetail['gameType'] != 'football') { ?>
                                    <div class="card-body d-flex justify-content-center align-items-center"
                                        style="height:50vh;">
                                        <h3>There are no live Games</h3>
                                    </div>
                                <?php } else { ?>
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="container  mb-5" id="targetScoreCard"
                                            style="width:60%;border: 1px solid;border-radius: 1rem;background-color:#282933;">
                                            <div class="row text-center">
                                                <div id="timer" class="display-4 mt-3 mb-3">00:00</div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                                    <h3 id="homeTeamName">Home Team</h3>
                                                    <h2 id="homeScore">0</h2>
                                                    <div id="homeScorerList" class="mt-3 mb-5"></div>
                                                </div>
                                                <div
                                                    class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                                    <h3 id="awayTeamName">Away Team</h3>
                                                    <h2 id="awayScore">0</h2>
                                                    <div id="awayScorerList" class="mt-3 mb-5"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container mt-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                                    <button class="btn btn-primary" id="homeGoal">Goal</button>
                                                    <input type="text" id="homeScorer" class="form-control"
                                                        placeholder="Scorer's Name" required>
                                                </div>
                                                <div
                                                    class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                                    <button class="btn btn-primary" id="awayGoal">Goal</button>
                                                    <input type="text" id="awayScorer" class="form-control"
                                                        placeholder="Scorer's Name" required>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <h2>Timer</h2>

                                                    <div class="form-group">
                                                        <label for="halfTimeDuration">Half Time Duration (in
                                                            minutes)</label>
                                                        <input type="number" id="halfTimeDuration" class="form-control"
                                                            value="15" min="1">
                                                    </div>
                                                    <div class="d-flex justify-content-center align-items-center mt-3 mb-3">
                                                        <button class="btn btn-success me-3" id="startTimer">Start</button>
                                                        <button class="btn btn-danger me-3" id="stopTimer">Stop</button>
                                                        <button class="btn btn-warning" id="resetTimer">Reset</button>
                                                        <button class="btn btn-warning" id="save">Save</button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" id="inputHomeTeamName"
                                                                class="form-control mb-3 col-md-6"
                                                                placeholder="Home Team Name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" id="inputAwayTeamName"
                                                                class="form-control mb-3 col-md-6"
                                                                placeholder="Away Team Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

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
<script type="text/javascript" src="../scripts/liveUpdate.js"></script>
<script type="text/javascript" src="../assets/vendor/libs/block-ui/block-ui.js"></script>
<script>
    var saveScore = document.getElementById('save');
    saveScore.addEventListener('click', () => {
        sendData();
        const refreshInterval = 1000; // Refresh every 5 seconds (adjust as needed)
        setInterval(sendData, refreshInterval);
    });
    // console.log(JSON.stringify(JSONRepresentation));
    function sendData(JSONRepresentation) {
        var root = document.getElementById('targetScoreCard');
        var JSONRepresentation = elementToJson(root);
        // console.log('append');
        $.ajax({
            type: 'POST',
            url: '../process/processInsertScoreCard.php',
            data: JSON.stringify(JSONRepresentation),
            contentType: 'application/json',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
            }
        });
    }
    function elementToJson(element) {
        const jsonElement = {};

        jsonElement.tag = element.tagName.toLowerCase();

        if (element.attributes.length > 0) {
            jsonElement.attributes = {};
            for (let i = 0; i < element.attributes.length; i++) {
                const attr = element.attributes[i];
                jsonElement.attributes[attr.name] = attr.value;
            }
        }
        if (element.hasChildNodes()) {
            jsonElement.children = [];
            element.childNodes.forEach(child => {
                if (child.nodeType === Node.ELEMENT_NODE) {
                    jsonElement.children.push(elementToJson(child));
                } else if (child.nodeType === Node.TEXT_NODE && child.textContent.trim() !== "") {
                    jsonElement.textContent = child.textContent.trim();
                }
            });
        }
        return jsonElement;
    }

</script>

</html>