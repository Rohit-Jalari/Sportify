const sendCode = document.getElementById("sendCode");

sendCode.addEventListener('click', () => {
    const email = document.getElementById("modalEmail");
    const emailDomain = document.getElementById("mailRestrictionField").innerHTML;
    const inputValue = document.getElementById('input').value.replace(/\s*-\s*/g, "");
    if (!validateInput(email, emailDomain)) {
        return;
    };
    console.log(email.value);
    LoadingUI(emailModalToggle);
    AJAXProcessor(inputValue, email.value.trim());

});

function validateInput(email, emailDomain) {
    const emailValue = email.value.trim();
    const emailDomainValue = emailDomain;
    var valid = true;

    if (emailValue === "") {
        setErrorFor(email, "*Email Field cannot be blank");
        valid = false;
    } else if (!isEmail(emailValue, emailDomainValue)) {
        setErrorFor(email, "*Email Domain does not matches !!!");
        valid = false;
    } else {
        removeError(email);
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

function isEmail(email, domain) {
    const regex = new RegExp(`([w.]*)${domain}`);
    return regex.test(email);
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
            if (data == true) {
                sendMail(requestData);
                // var passwordModal = new bootstrap.Modal(document.getElementById('passwordModalToggle'));
                // passwordModal.show();
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
function sendMail(requestData) {
    $("#emailModalToggle").block();
    $.ajax({
        type: 'POST',
        url: '../process/sendMail.php',
        data: JSON.stringify(requestData),
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
            $("#emailModalToggle").unblock();
            if (data.message == 'success') {
                var passwordModal = new bootstrap.Modal(document.getElementById('passwordModalToggle'));
                passwordModal.show();
            } else {
                setErrorFor(document.getElementById("modalEmail"), "Sorry, Email couldn't be sent.");
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            $("#emailModalToggle").unblock();
            console.error('Error:', textStatus, errorThrown);
        }
    });
}