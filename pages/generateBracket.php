<?php
require('../config/session.php');

?>
<!DOCTYPE html>
<html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <?php include('../includes/head.php'); ?>
    <?php include('../includes/bracketHead.php'); ?>
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
                        <div class="row">
                            <div class="col-x1">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <div class="row">
                                                <?php print_r($gameDetail); ?>
                                                <div class="col-7 d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-primary" type="button"
                                                        id="generateBracket">Generate Bracket
                                                    </button>
                                                </div>
                                                <div class="col-5">
                                                    <button class="btn btn-primary " type="button" id="saveBracket">Save
                                                        Bracket
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Separate box for "Game Name" -->
                                    </div> <!-- Separate box for the entire content -->
                                </div>
                            </div>
                            <div class="col-x1">
                                <div class="gap-2">
                                    <label class="form-label">
                                        <h3>
                                            Bracket
                                            <!-- Id's for bracket form : name, teams, team-count:number, selector:selector, seeds:selector, consolation_final:checkbox, create:button -->
                                        </h3>
                                    </label>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body mt-2">
                                        <div id="body">
                                            <div id="updateCurrentBracket" style="height:0;overflow:hidden;"></div>

                                            <!-- This div will be used as the root for the library. It must be **perfectly** empty to prevent a FOUC. -->
                                            <div id="bracketsViewerExample" class="brackets-viewer"></div>

                                            <div id="createNewBracket" style="height:0;overflow:hidden;"></div>
                                            <script type="text/javascript"
                                                src="../vendor/Bracket/dist/stage-form-creator.min.js"></script>

                                            <div id="input-mask">
                                                <div>
                                                    <h3></h3>
                                                    <label id="opponent1-label" for="opponent1">Opponent 1:
                                                    </label><input type="number" id="opponent1"><br>
                                                    <label id="opponent2-label" for="opponent2">Opponent 2:
                                                    </label><input type="number" id="opponent2"><br>
                                                    <button id="input-submit">Submit</button>
                                                </div>
                                            </div>

                                            <script type="text/javascript" src="../scripts/generateBracket.js"></script>
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
<script type="text/javascript" src="../assets/vendor/libs/block-ui/block-ui.js"></script>
<script>
    var generateBracket = document.getElementById("generateBracket");
    var saveBracket = document.getElementById("saveBracket");
    var status = 'createNewBracket';
    var formStatus;

    window.addEventListener('load', () => {
        LoadingUI('.row');
        var bracket = document.getElementById("bracketsViewerExample");
        if (bracket.childNodes.length > 0) {
            document.getElementById('body').firstElementChild.style.display = "none";
            var teamsCookie = getCookie("teamsCookie");
            if (teamsCookie !== null) {
                // Parse the JSON string back to an object
                var teams = JSON.parse(teamsCookie);
                rewrite(teams);
                // console.log(teams);
            } else {
                console.log("Cookie 'teamsCookie' not found.");
            }
        }
        $(".row").unblock();
    })
    saveBracket.addEventListener('click', () => {
        var root = document.getElementById('bracketsViewerExample');
        var JSONRepresentation = htmlToJson(root);
        console.log(JSON.stringify(JSONRepresentation));
        LoadingUI('.row');
        $.ajax({
            type: 'POST',
            url: '../process/processInsertBracket.php',
            data: JSON.stringify(JSONRepresentation),
            contentType: 'application/json',
            dataType: 'json',
            success: function (data) {
                $(".row").unblock();
                console.log(data);                
            },
            error: function (xhr, textStatus, errorThrown) {
                $(".row").unblock();
                console.error('Error:', textStatus, errorThrown);
            }
        });
    })
    generateBracket.addEventListener('click', () => {
        // var updateBracketForm = 
        document.getElementById('selector').value = "single_elimination";
        document.getElementById('seeds').value = "inner_outer";
        // document.getElementById('teams').value = "";
        document.getElementById('consolation_final').checked = true;

        LoadingUI('.row');
        AJAXProcessor(function (data) {
            var gameName = data[0];
            var nameList = data[1];
            // console.log(nameList);
            document.getElementById('name').value = gameName;
            document.getElementById('team-count').value = nameList.length;
            MainNameList = {};
            for (i = 0; i < nameList.length; i++) {
                key = 'Team ' + (i + 1);
                MainNameList[key] = nameList[i];
            }
            // console.log(MainNameList);
            if (status = 'createNewBracket') {
                formStatus = document.getElementById(status);
                var teamsJson = JSON.stringify(MainNameList);

                // Set a cookie with the JSON string
                document.cookie = "teamsCookie=" + encodeURIComponent(teamsJson);
                formStatus.querySelector('button[type="submit"]').click();
                status = 'updateCurrentBracket';
            }
        })
    });
    function rewrite(data) {
        var bracketExample = document.getElementById('bracketsViewerExample');
        var participantElements = bracketExample.querySelectorAll('.participant');

        // Loop through the elements and check the content of the name div
        participantElements.forEach(function (participantElement) {
            var nameElement = participantElement.querySelector('.name');
            var nameContent = nameElement.innerHTML.trim(); // Trim removes leading/trailing whitespace

            // Check if the content is not empty and not equal to "BYE"
            if (nameContent !== '' && nameContent !== 'BYE') {
                let endIndex = nameContent.indexOf('</span>');
                var contentAfterSpan = endIndex !== -1 ? nameContent.substring(endIndex + 7) : nameContent;
                console.log(contentAfterSpan);
                contentAfterSpan = contentAfterSpan.trim();
                nameElement.innerHTML = nameElement.innerHTML.replace(contentAfterSpan, data[contentAfterSpan]);
            }
        });
    }
    function LoadingUI(target) {
        $(target).block({
            message: '<div class="spinner-border spinner-border-lg text-primary" role="status"></div>',
            css: {
                backgroundColor: "transparent",
                border: "0"
            },
            overlayCSS: {
                backgroundColor: "#000",
                opacity: 0.25
            }
        })
    }
    function AJAXProcessor(callback) {
        $.ajax({
            type: 'POST',
            url: '../process/processBracket.php',
            contentType: 'application/json',
            dataType: 'json',
            success: function (data) {
                $(".row").unblock();
                callback(data);
            },
            error: function (xhr, textStatus, errorThrown) {
                $(".row").unblock();
                console.error('Error:', textStatus, errorThrown);
            }
        });
    }
    function getCookie(name) {
        const cookies = document.cookie.split(';');
        for (const cookie of cookies) {
            const [cookieName, cookieValue] = cookie.trim().split('=');
            if (cookieName === name) {
                return decodeURIComponent(cookieValue);
            }
        }
        return null; // Cookie not found
    }
    function htmlToJson(element) {
        var result = {};

        // Convert attributes to JSON
        var attributes = element.attributes;
        for (var i = 0; i < attributes.length; i++) {
            var attribute = attributes[i];
            result[attribute.name] = attribute.value;
        }
        // Convert child elements to JSON recursively
        var children = element.children;
        if (children.length > 0) {
            result.children = [];
            for (var j = 0; j < children.length; j++) {
                var childElement = children[j];
                result.children.push(htmlToJson(childElement));
            }
        }
        // Convert text content to JSON
        var textContent = element.textContent.trim();
        if (textContent !== '') {
            result.textContent = textContent;
        }
        return result;
    }
    function jsonToHtml(jsonData) {
        var element = document.createElement(jsonData.tag);
        // Set attributes
        for (var key in jsonData.attributes) {
            element.setAttribute(key, jsonData.attributes[key]);
        }
        // Set text content
        if (jsonData.textContent) {
            element.textContent = jsonData.textContent;
        }
        // Recursively create child elements
        if (jsonData.children) {
            for (var i = 0; i < jsonData.children.length; i++) {
                var child = jsonData.children[i];
                var childElement = jsonToHtml(child);
                element.appendChild(childElement);
            }
        }
        return element;
    }

</script>

</html>