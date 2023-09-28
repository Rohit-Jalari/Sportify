<div class="modal fade" id="emailModalToggle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fw-bold"
                    style="width:100%;display:flex; justify-content:center;align-items:center;" id="modalToggleLabel"
                    style="font-size: 1.5rem;">Mail Verification
                    Required</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body text-white">
                <h6 class="mb-1" style="line-height:1.3rem;">This Tournament is <span class="mark fw-bold text-black">email
                        restricted.</span></h6>
                <h6 class="mb-4" style="line-height:1.3rem;">Please authenticate using an email with the domain <span
                        class="mark fw-bold text-black" id="mailRestrictionField"></span></h6>
                <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="modalEmail" name="email" placeholder="Enter your email"
                            autofocus />
                    </div>
                    <button class="btn btn-primary d-grid w-100">Send Code</button>
                </form>
            </div>
        </div>
    </div>
</div>