const verify = document.getElementById("verify");

verify.addEventListener('click', () => {
    const email = document.getElementById("modalEmail").value.trim();
    const code = document.getElementById("modalCode");
    const inputValue = document.getElementById('input').value.replace(/\s*-\s*/g, "");
    if (!validateCode(code)) {
        return;
    };
    console.log(email);
    LoadingUIPassword(passwordModalToggle);
    AJAXPasswordProcessor(inputValue, code.value.trim(), email);
});

function validateCode(code) {
    const codeValue = code.value.trim();
    var valid = true;

    if (codeValue === "") {
        setErrorFor(code, "*Code Field cannot be blank");
        valid = false;
    } else {
        removeError(code);
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
function AJAXPasswordProcessor(ID, code, email) {
    var requestData = {
        tournamentID: ID,
        code: code,
        email: email
    };
    $.ajax({
        type: 'POST',
        url: '../process/processPasswordModal.php',
        data: JSON.stringify(requestData),
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
            $("#passwordModalToggle").unblock();
            if(data == 'success') {
                location.replace('../pages/participatedTournamentIndex.php');
            } else {
                setErrorFor(document.getElementById("modalCode"), data);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            $("#passwordModalToggle").unblock();
            console.error('Error:', textStatus, errorThrown);
        }
    });
}