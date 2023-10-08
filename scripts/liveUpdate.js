$(document).ready(function () {
    var homeScore = 0;
    var awayScore = 0;
    var timerInterval;
    var halfTimeDuration = 15;
    var timerRunning = false;
    var timerSeconds = 0;
    var extraTimeSeconds = 0;
    var canStartTimer;
    $("#inputHomeTeamName, #inputAwayTeamName").on('input', function () {
        var homeTeamName = $("#inputHomeTeamName").val();
        var awayTeamName = $("#inputAwayTeamName").val();
        console.log(homeTeamName);
        var canStartTimer = homeTeamName && awayTeamName;

        if(canStartTimer) {
            $("#homeTeamName").text(homeTeamName);
            $("#awayTeamName").text(awayTeamName);
        }                
    });

    $("#homeGoal").click(function () {
        var scorerName = $("#homeScorer").val();
        if (scorerName) {
            homeScore++;
            displayScorer(scorerName, "home");
            $("#homeScore").text(homeScore);
            $("#homeScorer").val('');
        } else {
            alert("Please enter the scorer's name.");
        }
    });

    $("#awayGoal").click(function () {
        var scorerName = $("#awayScorer").val();
        if (scorerName) {
            awayScore++;
            displayScorer(scorerName, "away");
            $("#awayScore").text(awayScore);
            $("#awayScorer").val('');
        } else {
            alert("Please enter the scorer's name.");
        }
    });

    $("#startTimer").click(function () {
        if (!timerRunning) {
            startTimer();
        }
    });

    $("#stopTimer").click(function () {
        if (timerRunning) {
            clearInterval(timerInterval);
            timerRunning = false;
        }
    });

    $("#resetTimer").click(function () {
        clearInterval(timerInterval);
        timerRunning = false;
        $("#timer").text("00:00");
        extraTimeSeconds = 0;
    });

    $("#halfTimeDuration").change(function () {
        halfTimeDuration = parseInt($(this).val());
    });

    function startTimer() {
        timerRunning = true;
        timerInterval = setInterval(function () {
            if (timerSeconds >= halfTimeDuration * 60) {
                extraTimeSeconds = timerSeconds - halfTimeDuration * 60;
                var overTimeMinutes = Math.floor(extraTimeSeconds / 60); // Convert extra time to minutes
                var overTimeSeconds = extraTimeSeconds % 60; // Remaining seconds
                var extraTimeFormatted = (overTimeMinutes >= 1 ? overTimeMinutes + "'" : "1'");
                if (overTimeSeconds > 0) {
                    extraTimeFormatted += " + " + (overTimeSeconds + "'");
                }
                $("#timer").text(halfTimeDuration + "+" + extraTimeFormatted);
            } else {
                var minutes = Math.floor(timerSeconds / 60);
                var seconds = timerSeconds % 60;
                var formattedTime =
                    (minutes < 10 ? "0" : "") + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
                $("#timer").text(formattedTime);
            }
            timerSeconds++;
        }, 1000);
    }

    function displayScorer(scorerName, team) {
        var scorerList = team === "home" ? $("#homeScorerList") : $("#awayScorerList");
        var currentTime = $("#timer").text();
        var timerParts = currentTime.split('+');
        var minutes = parseInt(timerParts[0].replace("'", "").trim());
        var scoredTime = (minutes >= 1 ? minutes + "'" : "1'");

        if (timerParts.length > 1) {
            minutes = parseInt(timerParts[1].replace("'", "").trim());
            scoredTime += " + " + (minutes >= 1 ? minutes + "'" : "1'");
        }

        scorerList.append("<div>" + scorerName + " (" + scoredTime + ")" + "</div>");
    }
});