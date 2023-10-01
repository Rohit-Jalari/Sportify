const verify = document.getElementById("verify");

verify.addEventListener('click', () => {
    const code = document.getElementById("modalCode");
    const inputValue = document.getElementById('input').value.replace(/\s*-\s*/g, "");
    if (!isInputEmpty(code)) {
        return;
    };
    console.log(email.value);
    LoadingUI(emailModalToggle);
    // AJAXProcessor(inputValue, code.value.trim());

});

function isInputEmpty(code) {
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

function LoadingUI(target) {
    $(target).block({
        message: '<div class="spinner-border spinner-border-lg text-primary" role="status"></div>',
        timeout: 2000,
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
function AJAXProcessor(ID, mail) {
    var requestData = {
        tournamentID: ID,
        authenticatedMail: mail
    };
    $.ajax({
        type: 'POST',
        url: '../process/processEmailModal.php',
        data: JSON.stringify(requestData),
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
            $("#emailModalToggle").unblock();
            if(data.message == true) {

            } else {
                setErrorFor(document.getElementById("modalEmail"), "Account already used for authentication")
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            $("#emailModalToggle").unblock();
            console.error('Error:', textStatus, errorThrown);
        }
    });
}