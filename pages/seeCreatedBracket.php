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
    <?php include('../includes/bracketHead.php'); ?>
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core-dark.css">
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../includes/createdGameAside.php');
            function jsonToHtml($jsonData)
            {
                // Create an HTML element based on the JSON data
                $element = "<{$jsonData['tag']}";
                // Set attributes
                if (isset($jsonData['attributes'])) {
                    foreach ($jsonData['attributes'] as $key => $value) {
                        $element .= " $key=\"$value\"";
                    }
                }
                $element .= ">";
                // Set text content
                if (isset($jsonData['textContent'])) {
                    $element .= htmlspecialchars($jsonData['textContent']);
                }
                // Recursively create child elements
                if (isset($jsonData['children'])) {
                    foreach ($jsonData['children'] as $child) {
                        $childElement = jsonToHtml($child);
                        $element .= $childElement;
                    }
                }
                $element .= "</{$jsonData['tag']}>";
                return $element;
            }
            $filter = ["gameID" => $gameDetail["gameID"]];
            $result = $databaseCon->BracketInformation->findOne($filter);

            $htmlElement = jsonToHtml($result["JSONRepresentation"]);
            print_r($htmlElement);
            ?>

            <div class="layout-page">
                <?php include('../includes/navbar.php');


                ?>
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
                </div>iv>
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