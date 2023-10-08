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
            <?php include('../includes/participatedGameAside.php'); ?>

            <div class="layout-page">
                <?php include('../includes/navbar.php');


                ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
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
                                            <!-- This div will be used as the root for the library. It must be **perfectly** empty to prevent a FOUC. -->
                                            <div id="bracketsViewerExample" class="brackets-viewer"></div>

                                        </div>
                                    </div>
                                </div>
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
    document.addEventListener('DOMContentLoaded', () => {
        LoadingUI('.row');
        fetchBracket();
        const refreshInterval = 1000; // Refresh every 5 seconds (adjust as needed)
        setInterval(fetchBracket, refreshInterval);
    });
    function fetchBracket() {
        $.ajax({
            type: 'POST',
            url: '../process/processGetBracket.php',
            success: function (data) {
                $(".row").unblock();
                if (data.message == "success") {
                    // var bracket = document.getElementById('bracketsViewerExample');
                    var bracketElement = jsonToElement((data.data));
                    var appended = document.getElementById('bracketsViewerExample');
                    var bodyElement = document.getElementById('body');
                    // console.log('scroll top =' + bracketElement.scrollTop);
                    // console.log('scroll Left =' + bracketElement.scrollLeft);
                    while (bodyElement.firstChild) {
                        bodyElement.removeChild(bodyElement.firstChild);
                    }
                    document.querySelector('#body').appendChild(bracketElement);
                    console.log('appended');
                }
                // console.log(data.message);
            },
            error: function (xhr, textStatus, errorThrown) {
                $(".row").unblock();
                console.error('Error:', textStatus, errorThrown);
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
    function jsonToElement(json) {
        const element = document.createElement(json.tag);

        if (json.attributes) {
            for (const key in json.attributes) {
                element.setAttribute(key, json.attributes[key]);
            }
        }

        if (json.textContent) {
            element.textContent = json.textContent;
        }

        if (json.children) {
            json.children.forEach(child => {
                const childElement = jsonToElement(child);
                element.appendChild(childElement);
            });
        }
        return element;
    }


</script>

</html>