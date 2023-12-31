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
                                <div class="card-body d-flex flex-column justify-content-center align-items-center" id="body">
                                    <div class="container  mb-5" id="targetScoreCard"
                                        style="width:60%;border: 1px solid;border-radius: 1rem;background-color:#282933;">
                                    
                                    </div>
                                    <?php
                                    // print_r($gameDetail);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
            </div>
        </div>
    </div>
</body>
<?php include('../includes/script.php') ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetchBracket();
        const refreshInterval = 1000; // Refresh every 5 seconds (adjust as needed)
        setInterval(fetchBracket, refreshInterval);
    });
    function fetchBracket() {
        $.ajax({
            type: 'POST',
            url: '../process/processGetScoreCard.php',
            success: function (data) {
                if (data.message == "success") {
                    var bracketElement = jsonToElement((data.data));
                    var appended = document.getElementById('targetScoreCard');
                    var bodyElement = document.getElementById('body');
                    while (bodyElement.firstChild) {
                        bodyElement.removeChild(bodyElement.firstChild);
                    }
                    document.querySelector('#body').appendChild(bracketElement);
                    console.log('appended');
                }
                // console.log(data.message);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
            }
        });
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