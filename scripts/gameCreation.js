const createGame = document.getElementById("createGame");
const gameName = document.getElementById("gameName");
const gameType = document.getElementById("gameType");
const gender = document.getElementById('gender');
const maxplayer = document.getElementById('maxplayer');
const minplayer = document.getElementById('minplayer');
const description = document.getElementById('description');
var gameNameValue, gameTypeValue, genderValue, descriptionValue, maxplayerValue="", minplayerValue="";


createGame.addEventListener('click', () => {
    createGame.blur();
    if (!validateGame()) {
        return;
    };
    LoadingUIPassword(gameModalToggle);
    var requestData = {
        gameName: gameNameValue,
        gameType: gameTypeValue,
        gender: genderValue,
        description: descriptionValue,
        maxplayer: maxplayerValue,
        minplayer: minplayerValue
    };
    AJAXGameProcessor(requestData);
});

function validateGame() {
    gameNameValue = gameName.value.trim();
    gameTypeValue = gameType.value;
    genderValue = gender.value;
    descriptionValue = description.value.trim();
    var valid = true;

    if (gameNameValue === "") {
        setErrorFor(gameName, "*Game Name Field cannot be blank");
        valid = false;
    } else if (!isName(gameNameValue)) {
        setErrorFor(gameName, "*Game Name Format is Invalid");
        valid = false;
    } else {
        removeError(gameName);
    }
    if (gameTypeValue === "") {
        setErrorFor(gameType, "*Game Type Field cannot be blank");
        valid = false;
    } else {
        removeError(gameType);
    }
    if (gameTypeValue == "football") {
        maxplayerValue = maxplayer.value;
        minplayerValue = minplayer.value;
        if (maxplayerValue === "") {
            setErrorFor(maxplayer, "*Max. Player Field cannot be blank");
            valid = false;
        } else {
            removeError(maxplayer);
        }
        if (minplayerValue === "") {
            setErrorFor(minplayer, "*Min. Player Field cannot be blank");
            valid = false;
        } else {
            removeError(minplayer);
        }
    }
    if (genderValue === "") {
        setErrorFor(gender, "*Gender Field cannot be blank");
        valid = false;
    } else {
        removeError(gender);
    }
    if (descriptionValue === "") {
        setErrorFor(description, "*Description Field cannot be blank");
        valid = false;
    } else {
        removeError(gender);
    }
    return valid;
}
function setErrorFor(element, message) {
    var input = element.parentElement;
    const small = input.querySelector('small');
    input.classList.add("error");
    small.innerText = message;
}
function removeError(element) {
    const input = element.parentElement;
    input.classList.remove("error");
}
function isName(name) {
    return /^[A-Za-z][A-Za-z0-9 ]*$/.test(name);
}
function LoadingUIPassword(target) {
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
function AJAXGameProcessor(requestData) {
    $.ajax({
        type: 'POST',
        url: '../process/processGameCreation.php',
        data: JSON.stringify(requestData),
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
            $("#gameModalToggle").unblock();
            if (data == 'success') {
                location.replace('../pages/createdGameList.php');
            } else {
                setErrorFor(document.getElementById("modalCode"), data);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            $("#gameModalToggle").unblock();
            console.error('Error:', textStatus, errorThrown);
        }
    });
}