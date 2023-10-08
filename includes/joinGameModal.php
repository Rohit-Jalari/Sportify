<div class="modal fade" id="joinGameModalToggle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold"
                    style="width:100%;display:flex; justify-content:center;align-items:center;" id="gameToggleLabel"
                    style="font-size: 1.5rem;">Game Participation</h5>
                <button type="button" id="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-header" style="padding-top:0;">
                <h4 class="modal-title fw-bold"
                    style="width:100%;display:flex; justify-content:center;align-items:center;" id="gameToggleLabel"
                    style="font-size: 1.5rem;">
                    <?= $gameDetail['gameName']; ?>
                </h4>
            </div>

            <div class="modal-body text-white">
                <?php
                if ($gameDetail['maxplayer'] == '' && $gameDetail['minplayer'] == '') { ?>
                    <div class="mb-3 Input">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name">
                        <small></small>
                    </div>
                <?php } else { ?>
                    <div class="mb-3 Input">
                        <label for="gameName" class="form-label">Team Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Team name">
                        <small></small>
                    </div>
                <?php } ?>

                <button class="btn btn-primary d-grid w-100" id="join">Join</button>
            </div>
        </div>
    </div>
</div>
<script>
    const join = document.getElementById("join");

    join.addEventListener('click', () => {
        const name = document.getElementById("name");
        if (!validateInput(name)) {
            return;
        };
        LoadingUI(joinGameModalToggle);
        AJAXProcessor(name.value);
    });
    function AJAXProcessor(name) {
        var requestData = {
            name: name
        };
        $.ajax({
            type: 'POST',
            url: '../process/processJoinGameModal.php',
            data: JSON.stringify(requestData),
            contentType: 'application/json',
            dataType: 'json',
            success: function (data) {
                if (data == 'success') {
                    console.log(data);
                    $("#joinGameModalToggle").unblock();
                    location.replace('participatedGameIndex.php');
                    // sendMail(requestData);
                } else {
                    $("#joinGameModalToggle").unblock();
                    setErrorFor(document.getElementById("name"), "Error occured");
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                $("#joinGameModalToggle").unblock();
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
    function validateInput(name) {
        const nameValue = name.value.trim();
        var valid = true;

        if (nameValue === "") {
            setErrorFor(name, "*Name Field cannot be blank");
            valid = false;
        } else {
            removeError(name);
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

</script>

</html>